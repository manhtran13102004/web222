<?php 
    class NewsModal extends Database{
        public function getAllNews(){
            $qr = "SELECT * FROM news";
            return mysqli_query($this->con, $qr);
        }
        public function getDetailNews($id){
            $qr = "SELECT * FROM news WHERE news_id = $id" ;
            return mysqli_query($this->con, $qr);
        }
    }

?>