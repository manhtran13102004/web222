<?php
    class News extends Controller{
        function index(){
            $news = $this->modal("NewsModal");
            $layout = $this->view("layouts/application", ["page"=>"application/News/index", "header"=>"shared/header", "footer"=>"shared/footer","news"=>$news->getAllNews()]);
            // echo $layout;
        }

        function detail($id){
            $news = $this->modal("NewsModal");
            $layout = $this->view("layouts/application", ["page"=>"application/News/page-detail", "header"=>"shared/header", "footer"=>"shared/footer","id"=>$news->getDetailNews($id),"news"=>$news->getAllNews()]);
        }
    }