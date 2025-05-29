<?php

    class Category extends Controller{
        function index(){
            $category = $this->modal("CategoryModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/categories/index", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "categories"=>$category->getAllCategory()]); 
        }
        function new(){
            $category = $this->modal("CategoryModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/categories/new", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "categoryModal" => $category]); 
        }
        function edit($id){
            $category = $this->modal("CategoryModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/categories/edit", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "category"=>$category->getCategoryWithId($id), "id" =>$id, "categoryModal" => $category]); 
        }
        function delete($id){
            $category = $this->modal("CategoryModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/categories/delete", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "category"=>$category->getCategoryWithId($id), "id" =>$id, "categoryModal" => $category]); 
        }


    }
?>

