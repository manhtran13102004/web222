<?php

    class Product extends Controller{
        function index(){
            $product = $this->modal("ProductModal");
            $category = $this->modal("CategoryModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/products/index", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "products"=>$product->getAllProduct(), "categories"=>$category->getAllCategory()], ); 
        }

        function new(){
            $product = $this->modal("ProductModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/products/new", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "productModal" => $product]); 
        }
        function edit($id){
            $product = $this->modal("ProductModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/products/edit", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "product"=>$product->getProductWithId($id), "id" =>$id, "productModal" => $product]); 
        }
        function delete($id){
            $product = $this->modal("ProductModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/products/delete", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "product"=>$product->getProductWithId($id), "id" =>$id, "productModal" => $product]); 
        }

    }
?>