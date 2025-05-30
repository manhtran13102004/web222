<?php

    class home extends Controller{
        function index(){
            $product = $this->modal("ProductModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/index", "header"=>"shared/header", "footer"=>"shared/footer", "products"=>$product->getAllProduct()]);
            
        }

        function catalog(){
            //load Modal
            $product = $this->modal("ProductModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/catalog", "header"=>"shared/header", "footer"=>"shared/footer", "products"=>$product->getAllProduct()]);
            // echo $layout;
        }
        
        function category($id){
            //load Modal
            $layout = $this->view("layouts/application", ["page"=>"application/home/category", "id" => $id]);
            // echo $layout;
        }
        
        function search($name){
            //load Modal
            $product = $this->modal("ProductModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/search", "header"=>"shared/header", "footer"=>"shared/footer", "products"=>$product->getProductWithName($name), "name" => $name]);
            // echo $layout;
        }

        function product($id){
            //load modal with ID
            $product = $this->modal("ProductModal"); 
            $comment = $this->modal("CommentModal");
<<<<<<< HEAD
           // Lấy sản phẩm và comment
            $productData = $product->getProductWithID($id);
            $comments = $comment->getCommentsByProductId($id);
            $layout = $this->view("layouts/application", [
            "page" => "application/home/product",
            "header" => "shared/header",
            "footer" => "shared/footer",
            "product" => $productData,
            "comments" => $comments,
            "commentModal" => $comment,
            "pid" => $id
             ]);
=======
            $layout = $this->view("layouts/application", ["page"=>"application/home/product", "header"=>"shared/header", "footer"=>"shared/footer", "product"=>$product->getProductWithID($id), "commentModal" => $comment, "pid" => $id]);
            // echo $layout;
>>>>>>> 69c3407 (nut dat hang)
        }

        function contact(){
            $layout = $this->view("layouts/application", ["page"=>"application/home/contact", "header"=>"shared/header", "footer"=>"shared/footer"]);
            // echo $layout;
        }

        function cart(){
            $layout = $this->view("layouts/application", ["page"=>"application/home/cart", "header"=>"shared/header", "footer"=>"shared/footer"]);
            // echo $layout;
        }
        
        function account(){
            $user = $this->modal("userModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/account", "header"=>"shared/header", "footer"=>"shared/footer", "userModal"=>$user]);
            // echo $layout;
        }

        function payment($price){
            $order = $this->modal("OrderModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/payment", "header"=>"shared/header", "footer"=>"shared/footer", "price" =>$price, "orderModal"=>$order]);
            // echo $layout;
        }

<<<<<<< HEAD
        function success($oid, $uid, $datetime, $price, $name, $email, $phone, $address){
            $order = $this->modal("OrderModal");
            $layout = $this->view("layouts/application", ["page"=>"application/home/success", "header"=>"shared/header", "footer"=>"shared/footer","oid"=>$oid, "uid"=>$uid,"date"=>$datetime, "price"=>$price, "name"=>$name, "email"=>$email, "phone"=>$phone, "address"=>$address,"orderModal"=>$order]);
            // echo $layout;
        }
        
        
        
    }
?>
=======
       
function success() {
    // Ưu tiên nhận từ POST (form)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
        $oid = $_POST["oid"] ?? '';
        $uid = $_POST["uid"] ?? '';
        $date = $_POST["date"] ?? '';
        $price = $_POST["price"] ?? '';
        $name = $_POST["name"] ?? '';
        $email = $_POST["email"] ?? '';
        $phone = $_POST["phone"] ?? '';
        $address = $_POST["address"] ?? '';
        $products = isset($_POST["products"]) ? json_decode($_POST["products"], true) : [];
    } else {
        // Nếu là JSON (AJAX)
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $oid = $data["oid"] ?? '';
        $uid = $data["uid"] ?? '';
        $date = $data["date"] ?? '';
        $price = $data["price"] ?? '';
        $name = $data["name"] ?? '';
        $email = $data["email"] ?? '';
        $phone = $data["phone"] ?? '';
        $address = $data["address"] ?? '';
        $products = $data["products"] ?? [];
    }

    $order = $this->modal("OrderModal");

    echo $this->view("layouts/application", [
        "page" => "application/home/success",
        "header" => "shared/header",
        "footer" => "shared/footer",
        "oid" => $oid,
        "uid" => $uid,
        "date" => $date,
        "price" => $price,
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "address" => $address,
        "products" => $products,
        "orderModal" => $order
    ]);
// Kết nối đến cơ sở dữ liệu (MySQLi)
$conn = new mysqli("localhost", "root", "", "web222");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Chèn đơn hàng vào bảng orderr
$query = "INSERT INTO orderr (order_id, customer_id, order_date, total_price, address, phone, email, name) 
          VALUES (N'$oid', N'$uid', N'$date', N'$price', N'$address', N'$phone', N'$email', N'$name');";

if ($conn->query($query)) {
    // Tiếp tục chèn các sản phẩm vào bảng order_product
    foreach ($products as $product) {
        $product_id = $product['product_id'];
        $quantity = $product['order_quantity'];
        $insertProduct = "INSERT INTO order_product (order_id, product_id, order_quantity) 
                          VALUES ('$oid', '$product_id', '$quantity')";
        $conn->query($insertProduct);
    }

    echo "<script>alert('Đặt hàng thành công!'); localStorage.clear(); window.location.href = 'http://localhost:8080/web222/';</script>";
} else {
    echo "Lỗi khi thêm đơn hàng: " . $conn->error;
}

$conn->close();

}


    }
?>
>>>>>>> 69c3407 (nut dat hang)
