<?php 
    class User extends Controller{

        function sign_up(){
            $userModal = $this->modal("UserModal");
            $customerModal = $this->modal("CustomerModal");
            $layout = $this->view("layouts/log", ["log_page"=>"application/User/sign_up","userModal" => $userModal,"customerModal" => $customerModal]);
        }
        
        function sign_in(){
            $userModal = $this->modal("UserModal");
            $customerModal = $this->modal("CustomerModal");
            $layout = $this->view("layouts/log", ["log_page"=>"application/User/sign_in", "userModal" => $userModal,"customerModal" => $customerModal]);
            
        }
        
        function log_out(){
            $userModal = $this->modal("UserModal");
            $customerModal = $this->modal("CustomerModal");
            $layout = $this->view("layouts/log", ["log_page"=>"application/User/log_out", "userModal" => $userModal,"customerModal" => $customerModal]);
        }

        function profile(){

        }

        //function comment() ?
    }

?>
