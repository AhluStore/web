<?php
class alibaba_Home extends Home {

	public function __construct(){
         parent::__construct();
		 
     }

    public function index()
    {
		$page = __FUNCTION__; 
		$title = Ahlu_Settings("website_title","Home");

		$keyword =Ahlu_Settings("seo_keyword");

	    $this->seo->setTitle($title);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();

		$this->data["seo"] = $this->seo->Meta(); 
		$this->data["cls"] = "home"; 
		//use ouput filter

		$this->data["content"] = $this->load->view(THEME."_home_{$page}",array(),true);  
		
		 //load theme

        $this->showTemplate($this->data); 
    }   
	///////////////////////////////////////////
	public function import($to){
       }
        public function export($to){
        }
}