<?php

    class Promotion extends Controller{
        function index(){
            $promotion = $this->modal("PromotionModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/promotions/index", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "promotions"=>$promotion->getAllPromotion()]); 
        }

        function new(){
            $promotion = $this->modal("PromotionModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/promotions/new", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "promotionModal" => $promotion]); 
        }

        function edit($id){
            $promotion = $this->modal("PromotionModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/promotions/edit", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "promotion"=>$promotion->getPromotionByID($id), "id" =>$id, "promotionModal" => $promotion]); 
        }

        function delete($id){
            $promotion = $this->modal("PromotionModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/promotions/delete", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "promotion"=>$promotion->getPromotionByID($id), "id" =>$id, "promotionModal" => $promotion]); 
        }

    }
?>
