<?php
class alibaba_Template extends portal {

    public function __construct(){
         parent::__construct();
		 //library
		 API_VIDEO();
		  $this->post_type = "template";
     }
      
    public function index()
    {
        $page = __FUNCTION__; 
		$title = meta_key_option("title_website");

		$keyword =meta_key_option("keyword");

	    $this->seo->setTitle("template - ".DOMAIN);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();

		$this->data["cls"] = " template ";
		$this->data["seo"] = $this->seo->Meta(); 
		
		///////
		global $AhluOverride;
		$type = ucfirst($this->post_type);
		
		
		
        $this->data["seo"] = $this->seo->Meta(); 

		 $this->data["content"] = $this->load->view(THEME."_template_index",array(),true);  
        //load theme
        $this->showTemplate($this->data); 
    }   
    

    public function post($id)
    {      
        if(empty($id)){
			//404
			$this->redirect(404,$params=array("error"=>"Page Not Found"));
		}
		
		$post =AhluEntity("view_post");
		if(!$post->readObject(array(
			"id_post"=>$id
		))){
			//404
			$this->redirect(404,$params=array("error"=>"Page Not Found"));
		}
       
		AhluURL::Data("post",$post->Data());

		global $AhluOverride;

		$breadCrumbs = post_breadCrumb($post->Data());
		array_unshift($breadCrumbs,array("title"=>'<i class="fa fa-home">&nbsp;</i>',"slug"=>""));
		$AhluOverride->add("ahlu_breadcrumb",function($seperate,$links) use($breadCrumbs){	
			$str = "";
			
			foreach($breadCrumbs as $i=> $item){
				if($i==count($breadCrumbs)-1){
					$str.= '<li><a href="#" class="homepage-link">'.$item["title"].'</a></li>';
				}else{
					$str.= '<li><a href="'.site_url($item["slug"]).'" class="homepage-link">'.$item["title"].'</a></li>';
				}
			}
			return '<ul class="breadcrumb">'.$str.'</ul>';
		},1);

		//load SEO
		$page = __FUNCTION__; 
		$title = meta_key_option("title_website");

		$keyword =meta_key_option("keyword");
		$title = strip_tags($post->title);
	    $this->seo->setTitle("{$title}");

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription(strip_tags($post->excerpt));

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		
		$this->data["cls"] = " template post {$post->url} {$post->id_post}";
	    $this->data["seo"] = $this->seo->Meta();  
		 
		 $this->data["content"] = $this->load->view("alibaba_template_post",array("post"=>$post),true);  
        //load theme
        $this->showTemplate($this->data); 
    }
    /**
    * Category
    */
    public function category($id=null)
    {
      if($id==null){
          //redirect
          $this->redirect("404");
      }
      $category =AhluEntity("view_category");
		if(!$category->readObject(array(
			"id_category"=>$id
		))){
			//404
			$this->redirect(404,$params=array("error"=>"Page Not Found"));
		}
		AhluURL::Data("category",$category->Data());

		global $AhluOverride;

        $breadCrumbs = category_breadCrumb($id);

		array_unshift($breadCrumbs,array("title"=>'<i class="fa fa-home">&nbsp;</i>',"slug"=>""));
		$AhluOverride->add("ahlu_breadcrumb",function($seperate,$links) use($breadCrumbs){	
			$str = "";
			
			foreach($breadCrumbs as $i=> $item){
				if($i==count($breadCrumbs)-1){
					$str.= '<li><a href="#" class="homepage-link">'.$item["title"].'</a></li>';
				}else{
					$str.= '<li><a href="'.site_url($item["slug"]).'" class="homepage-link">'.$item["title"].'</a></li>';
				}
			}
			return '<ul class="breadcrumb">'.$str.'</ul>';
		},1);

		//load SEO
		$page = __FUNCTION__; 
		$title = meta_key_option("title_website");

		$keyword =meta_key_option("keyword");
		$title = strip_tags($category->name_category);
	    $this->seo->setTitle("{$title} - Văn hóa ngày nay");

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription(strip_tags($category->description_category));

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		
		$this->data["cls"] = "template post {$category->url} {$category->id_category}";
	    $this->data["seo"] = $this->seo->Meta();  

        $this->data["content"] = $this->load->view("alibaba_template_category",array("category"=>AhluURL::Data("category")),true ); 
       //load theme
       $this->showTemplate($this->data);
    }
    ///////////////////////////////////////////
   
    
     public function import($to){
            
        }

        public function export($to){
            
        }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>