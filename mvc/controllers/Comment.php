<?php
    class comment extends Controller{
        function index(){
            $comment = $this->modal("CommentModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/comments/index", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "comments"=>$comment->getAllComment()]); 
        }
        function new(){
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/comments/new", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar"]); 
        }
        function edit(){
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/comments/edit", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar"]); 
        }
        // function delete($pid, $cid){
        //     $comment = $this->modal("CommentModal");
        //     $layout = $this->view("layouts/admin", ["admin_page"=>"admin/comments/index", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "comment"=>$comment->getComment($pid,$cid), "pid"=>$pid, "cid"=>$cid,"commentModal"=>$comment]); 
        // }
        function delete($pid, $cid){
            $comment = $this->modal("CommentModal");
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/comments/delete", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar", "comment"=>$comment->getComment($pid,$cid), "pid"=>$pid,"cid"=>$cid,"commentModal"=>$comment]); 
        }
    }
?>