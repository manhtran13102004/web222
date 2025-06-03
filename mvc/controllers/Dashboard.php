<?php
    class dashboard extends Controller{
        function index(){
            $layout = $this->view("layouts/admin", ["admin_page"=>"admin/dashboards/index", "admin_header"=>"shared/admin_header", "admin_sidebar"=>"shared/admin_sidebar"]); 
        }
        
    }
?>
