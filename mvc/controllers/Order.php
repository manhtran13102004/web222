<?php

    class Order extends Controller{
        function index(){
            $order = $this->modal("OrderModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/orders/index", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "orders"=>$order->getAllOrder()]); 
        }
        function edit($id){
            $order = $this->modal("OrderModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/orders/edit", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "order"=>$order->getOrderByID($id), "id" =>$id, "orderModal" => $order]); 
        }
        function delete($id){
            $order = $this->modal("OrderModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/orders/delete", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "order"=>$order->getOrderByID($id), "id" =>$id, "orderModal" => $order]); 
        }
    }
?>