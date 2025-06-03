<?php
    class Controller{
        public function modal($modal){
            require_once "./mvc/modals/".$modal.".php";
            return new $modal;
        }

        public function view($view, $data = []){
            require_once "./mvc/views/".$view.".php";
        }
    }
?>
