<?php 
    class App{
        protected $page = "Home";
        protected $action = "index";
        protected $params = [];

        function __construct()
        {   
            $url_arr = $this->getURL();

            //controller process
            if(isset($url_arr[0])){
                if(file_exists("./mvc/controllers/".$url_arr[0].".php")){
                    $this->page = $url_arr[0];  
                }
                unset($url_arr[0]);
            }

            require_once "./mvc/controllers/".$this->page.".php";
            $this->page = new $this->page;
            
            //action process
            if(isset($url_arr[1])){
                if (strlen(strstr($url_arr[1], ".php")) > 0) {
                    $url_arr[1] = substr($url_arr[1], 0, strlen($url_arr[1])-4);
                }
                if(method_exists($this->page, $url_arr[1])){
                    $this->action = $url_arr[1];
                }
                unset($url_arr[1]);
            }

            
            //params process
            $this->params = $url_arr?array_values($url_arr):[];
            call_user_func_array([$this->page, $this->action], $this->params);
        }

        function getURL(){
            if(isset($_GET["url"])){
                return explode("/", filter_var(trim($_GET["url"])));
            }
           
        }
    }
    
?>
<!-- 
page: product
action: product001
params: ['cocacola', 'big']
call_user_func_array['product', 'product001', ['cocacola', 'big']]

call_user_func_array['Order', 'edit', ['order001']]


localhost:8080/web222/product/product001/cocacola/big -->