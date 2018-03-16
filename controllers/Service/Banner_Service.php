<?php
  /**
  * Banner File
  */
    class Banner_Service extends Media_Service{
        
        public function __construct(){
            print_r($this);
        }
        
        
        ////overload
		public function index(){
		   echo get_class();
		}
		
		public function insert(){
		   echo "insert";
		}
		public function edit(){
		   echo "insert";
		}
		public function delete(){
		   echo "insert";
		}
		/////        
    }
?>