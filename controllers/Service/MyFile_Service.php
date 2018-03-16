<?php
	
  /**
  * Custom File
  */
    class MyFile_Service extends File_Service{
        
		
        public function __construct(){
			parent::__construct();
			$this->path = ROOT_THEME_UPLOAD;
			$this->file_library->path = $this->path;
        }
        
        
        ////implement and override
        public function index(){
            echo parent::index();
        }
		
		public function askForFileCode(){
			return null;
		}
	}
?>