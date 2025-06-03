<?php
class AdminController {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getDashboardStats() {
        // Get total orders
        $totalOrders = $this->db->query("SELECT COUNT(*) as total FROM orderr WHERE status = 'paid'")->fetch()['total'];

        // Get total revenue
        $totalRevenue = $this->db->query("SELECT SUM(total_price) as total FROM orderr WHERE status = 'paid'")->fetch()['total'];

        // Get top selling products
        $topProducts = $this->db->query("
            SELECT 
                p.product_name,
                SUM(op.order_quantity) as sold_quantity,
                SUM(op.order_quantity * p.price) as revenue
            FROM order_product op
            JOIN product p ON op.product_id = p.product_id
            JOIN orderr o ON op.order_id = o.order_id
            WHERE o.status = 'paid'
            GROUP BY p.product_id
            ORDER BY sold_quantity DESC
            LIMIT 5
        ")->fetchAll();

        // Get monthly revenue for chart
        $monthlyRevenue = $this->db->query("
            SELECT 
                DATE_FORMAT(order_date, '%Y-%m') as month,
                SUM(total_price) as revenue
            FROM orderr
            WHERE status = 'paid'
            AND order_date >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
            GROUP BY DATE_FORMAT(order_date, '%Y-%m')
            ORDER BY month ASC
        ")->fetchAll();

        $chartLabels = [];
        $chartData = [];
        foreach ($monthlyRevenue as $data) {
            $chartLabels[] = $data['month'];
            $chartData[] = $data['revenue'];
        }

        return [
            'total_orders' => $totalOrders,
            'total_revenue' => $totalRevenue,
            'top_products' => $topProducts,
            'chart_labels' => $chartLabels,
            'chart_data' => $chartData
        ];
    }
} 