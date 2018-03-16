<?php
  /**
  * Gallery File
  */
    class Gallery_Service extends File_Service{
        
        public function __construct(){
            print_r($this);
        }
        
        
        ////implement and override
        public function index(){
            echo "Gallery_Service";
        }
    /////        
    }
?>