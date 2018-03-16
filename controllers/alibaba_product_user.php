<?php if ( ! defined('DOMAIN')) exit('No direct script access allowed');

class alibaba_product_user extends AhluFrontend {

     public function __construct(){

         parent::__construct();
		
		$this->post_type = "product";
		$this->user = current_user();
    }

	public function index()
	{   

		//check user exist
		if(empty($this->user)){
			$this->login();
		}else{
		    //show breadCrumbs and override breadCrumbs
			$breadCrumbs =  array(array("title"=>"Tai khoan","slug"=>"#"));
			//override breadcrumb system
			AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
				$a = array('<a href="'.site_url().'" title="Home">Home</a>');
				
				$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
				foreach($breadCrumbs as $item){
					if(isset($item["active"]) && $item["active"])

						$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

					else

						$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

				}
				$s=implode("<span>{$seperate}</span>",$a);
				return <<<AHLU
					<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

			},1);
			

			//load seo
			$title = website_title("Account");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-account account-index";


	        $content = $this->load->view("product/account/my-account",array("user"=>$this->user),true); 
	        $title = "Account";

	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data); 
		} 
	} 
	/*
	*
	*/
	public function post($id=null)

	{
		if(empty($this->user)){
			$this->login();
		}else{
			 //show breadCrumbs and override breadCrumbs
			$breadCrumbs =  array(array("title"=>"Tai khoan","slug"=>"#"));
			//override breadcrumb system
			AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
				$a = array('<a href="'.site_url().'" title="Home">Home</a>');
				
				$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
				foreach($breadCrumbs as $item){
					if(isset($item["active"]) && $item["active"])

						$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

					else

						$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

				}
				$s=implode("<span>{$seperate}</span>",$a);
				return <<<AHLU
					<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

			},1);
			

			//load seo
			$title = website_title("Account");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-account account-index";


	        $content = $this->load->view("product/account/my-account",array("user"=>$this->user),true); 
	        $title = "Account";

	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data); 
		} 
	} 
	/*
	*
	*/
	public function category($id)
	{   
	    
	} 
	/*
	* activity history
	*/
	public function activity()
	{   
		if(empty($this->user)){
			$this->login();
		}else{
			 //show breadCrumbs and override breadCrumbs
			$breadCrumbs =  array(array("title"=>"History activity","slug"=>"#"));
			//override breadcrumb system
			AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
				$a = array('<a href="'.site_url().'" title="Home">Home</a>');
				
				$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
				foreach($breadCrumbs as $item){
					if(isset($item["active"]) && $item["active"])

						$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

					else

						$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

				}
				$s=implode("<span>{$seperate}</span>",$a);
				return <<<AHLU
					<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

			},1);
			

			//load seo
			$title = website_title("History activity");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-activity account-activity";


	        $content = $this->load->view("product/account/my-activity",array("user"=>$this->user),true); 
	        $title = "My history activity";

	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data); 
		} 
	} 
	/*
	* activity history
	*/
	public function message()
	{   
		if(empty($this->user)){
			$this->login();
		}else{
			 //show breadCrumbs and override breadCrumbs
			$breadCrumbs =  array(array("title"=>"Message","slug"=>"#"));
			//override breadcrumb system
			AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
				$a = array('<a href="'.site_url().'" title="Home">Home</a>');
				
				$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
				foreach($breadCrumbs as $item){
					if(isset($item["active"]) && $item["active"])

						$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

					else

						$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

				}
				$s=implode("<span>{$seperate}</span>",$a);
				return <<<AHLU
					<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

			},1);
			

			//load seo
			$title = website_title("Message");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-activity account-activity";


	        $content = $this->load->view("product/account/my-message",array("user"=>$this->user),true); 
	        $title = "Latest message";

	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data); 
		} 
	}
	/*
	* Your enquiry
	*/
	public function enquiry()
	{   
		if(empty($this->user)){
			$this->login();
		}else{
			 //show breadCrumbs and override breadCrumbs
			$breadCrumbs =  array(array("title"=>"Enquiry","slug"=>"#"));
			//override breadcrumb system
			AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
				$a = array('<a href="'.site_url().'" title="Home">Home</a>');
				
				$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
				foreach($breadCrumbs as $item){
					if(isset($item["active"]) && $item["active"])

						$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

					else

						$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

				}
				$s=implode("<span>{$seperate}</span>",$a);
				return <<<AHLU
					<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

			},1);
			

			//load seo
			$title = website_title("Message");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-activity account-activity";


	        $content = $this->load->view("product/account/my-message",array("user"=>$this->user),true); 
	        $title = "Enquiry";

	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data); 
		} 
	} 
	/*
	*
	*/
	public function archieve($year=0,$month=0,$date=0)
	{      
	   $this->data["header"] = $this->load->view("component/header",array(),true); 
       $this->data["content"] = $this->load->view("product/account/archieve",array(),true); 
       //load theme
       $this->showTemplate($this->data); 
	} 
	/*
	*
	*/
	public function payment()
	{    
		//check user exist
		if(empty($this->user)){
			$this->login();
		}else{
			//show breadCrumbs and override breadCrumbs
		$breadCrumbs =  array(array("title"=>"payment","slug"=>"#"));
		//override breadcrumb system
		AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
				$a = array('<a href="'.site_url().'" title="Home">Home</a>');
				
				$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
				foreach($breadCrumbs as $item){
					if(isset($item["active"]) && $item["active"])

						$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

					else

						$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

				}
				$s=implode("<span>{$seperate}</span>",$a);
				return <<<AHLU
				<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

		},1);
		

			//load seo
			$title = website_title("Payment");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-account-payment";


	        $content = $this->load->view("product/account/my-payment",array("user"=>$this->user),true); 
	        $title = "My Payemnt";


	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data);
		}
	} 
	/**
	*
	* Check order
	*/
	public function order_check($id=null){

		$detail_order = null;
		$title = "";

		if($id){
			$entity = query("select * from ".table_prefix("invoice")." where barcode='{$id}' or id_invoice='{$id}'");
			if($entity){
				$detail_order = new Ahlu_E_Order($entity[0]->id_invoice); 	
				$detail_order->fetch();
			}
			
			$title = "Kiem tra do hang ".$detail_order->data->barcode;
			$breadCrumbs =  array(array("title"=>$title,"slug"=>"#"));
		}else{
			$title = "Kiem tra do hang";
			//show breadCrumbs and override breadCrumbs
			$breadCrumbs =  array(array("title"=>$title,"slug"=>"#"));
		}

		//override breadcrumb system
		AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
			$a = array('<a href="'.site_url().'" title="Home">Home</a>');
			
			$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
			foreach($breadCrumbs as $item){
				if(isset($item["active"]) && $item["active"])

					$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

				else

					$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

			}
			$s=implode("<span>{$seperate}</span>",$a);
			return <<<AHLU
				<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

		},1);
		

		//load seo
		$title = website_title($title);

		$keyword =Ahlu_Settings("seo_keyword");
	    $this->seo->setTitle($title);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		$this->data["seo"] = $this->seo->Meta(); 

	    $this->data["cls"] = "my-order-check check-order-{$id}";

        $this->data["content"] = $this->load->view("product/account/my-account-orders-check",array("title"=>$title,"user"=>$this->user,"order"=>$detail_order),true); 

        //load theme

        $this->showTemplate($this->data);       
	}
	/*
	* List all order account
	*/
	public function order($id=null){
		//check user exist
		if(empty($this->user)){
			$this->login();
		}else{
			$detail_order = null;
			$title = "";


			if($id){

				$detail_order = new Ahlu_E_Order($id); 	

				$title = "Hoa don - ".$detail_order->data->barcode;
				$breadCrumbs =  array(array("title"=>$title,"slug"=>"#"));
			}else{
				$title = "Lich su hoa don";
				//show breadCrumbs and override breadCrumbs
				$breadCrumbs =  array(array("title"=>$title,"slug"=>"#"));
			}
			
			//override breadcrumb system
			AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
				$a = array('<a href="'.site_url().'" title="Home">Home</a>');
				
				$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
				foreach($breadCrumbs as $item){
					if(isset($item["active"]) && $item["active"])

						$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

					else

						$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

				}
				$s=implode("<span>{$seperate}</span>",$a);
				return <<<AHLU
					<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

			},1);
			

			//load seo
			$title = website_title($title);

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-order-item";

		   	//

		    if($detail_order){
		    	$content = $this->load->view("product/account/my-account-orders-item",array("order"=>$detail_order,"user"=>$this->user),true); 
		    }else{
		    	$content = $this->load->view("product/account/my-account-orders",array("user"=>$this->user),true); 
		    }

	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"content"=>$content),true); 

	        //load theme
	        $this->showTemplate($this->data); 
	    }
	}
	/************************************/
	/*
	*
	*
	*/ 
	public function history(){
		//check user exist
		if(empty($this->user)){
			$this->login();
		}else{
			//load seo
			$title = website_title("History");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-history history-index";


	        $content = $this->load->view("product/account/my-account-history",array(),true); 
	        $title = "History";


	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data);
        }    
	}

	public function login(){

		//load seo
		$title = website_title("Login");

		$keyword =Ahlu_Settings("seo_keyword");
	    $this->seo->setTitle($title);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		$this->data["seo"] = $this->seo->Meta(); 

	    $this->data["cls"] = "my-login login-index";


        $content = $this->load->view("product/account/my-account-login",array(),true); 
        $title = "Login";


        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"content"=>$content),true); 

        //load theme

        $this->showTemplate($this->data);    
	}
	/*
	*
	*/
	public function logout(){
		//load seo
			$title = website_title("Logout");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-enquiry enquiry-index";


	        $content = $this->load->view("product/account/my-logout",array(),true); 
	        $title = "Logout";


	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data);         
	}

	/*
	*
	*/
	public function delete(){
		//load seo
			$title = website_title("Delete account");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-delete-account";


	        $content = $this->load->view("product/account/my-delete",array(),true); 
	        $title = "Delete account";


	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data);         
	}

	/**
	*
	*/
	public function wishlist(){

		//show breadCrumbs and override breadCrumbs
		$breadCrumbs =  array(array("title"=>"Wishlist","slug"=>"#"));
		//override breadcrumb system
		AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
			$a = array('<a href="'.site_url().'" title="Home">Home</a>');
			
			$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
			foreach($breadCrumbs as $item){
				if(isset($item["active"]) && $item["active"])

					$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

				else

					$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

			}
			$s=implode("<span>{$seperate}</span>",$a);
			return <<<AHLU
				<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

		},1);
		

		//load seo
		$title = website_title("Wishlist");

		$keyword =Ahlu_Settings("seo_keyword");
	    $this->seo->setTitle($title);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		$this->data["seo"] = $this->seo->Meta(); 

	    $this->data["cls"] = "my-wishlist wishlist-index";


        $content = $this->load->view("product/account/my-wishlist",array("user"=>$this->user),true); 
        $title = "My Wishlist";


        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

        //load theme

        $this->showTemplate($this->data); 
	}
	
	/**
	*
	*/
	public function compare(){

		//show breadCrumbs and override breadCrumbs
		$breadCrumbs =  array(array("title"=>"Compare","slug"=>"#"));
		//override breadcrumb system
		AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
			$a = array('<a href="'.site_url().'" title="Home">Home</a>');
			
			$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
			foreach($breadCrumbs as $item){
				if(isset($item["active"]) && $item["active"])

					$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

				else

					$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

			}
			$s=implode("<span>{$seperate}</span>",$a);
			return <<<AHLU
				<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

		},1);
		

		//load seo
		$title = website_title("Compare");

		$keyword =Ahlu_Settings("seo_keyword");
	    $this->seo->setTitle($title);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		$this->data["seo"] = $this->seo->Meta(); 

	    $this->data["cls"] = "my-compare compare-index";


        $content = $this->load->view("product/account/my-compare",array("user"=>$this->user),true); 
        $title = "My Compare";


        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

        //load theme

        $this->showTemplate($this->data); 
	}

	public function recover_password(){

        $this->data["content"] = $this->load->view("product/account/user_recover_password",array(),true); 
       $this->showTemplate($this->data);     
	}
	
	/*
	* Message
	*/
	public function point(){

		//check user exist
		if(empty($this->user)){
			$this->login();
		}else{
			//show breadCrumbs and override breadCrumbs
		$breadCrumbs =  array(array("title"=>"point","slug"=>"#"));
		//override breadcrumb system
		AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
				$a = array('<a href="'.site_url().'" title="Home">Home</a>');
				
				$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
				foreach($breadCrumbs as $item){
					if(isset($item["active"]) && $item["active"])

						$a[] = '<span title="'.$item["title"].'" class="active">'.$item["title"].'</span>';

					else

						$a[] = '<a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a>';

				}
				$s=implode("<span>{$seperate}</span>",$a);
				return <<<AHLU
				<div class="ahlu_e_breadcrumb">{$s}</div>
AHLU;

		},1);
		

			//load seo
			$title = website_title("Point");

			$keyword =Ahlu_Settings("seo_keyword");
		    $this->seo->setTitle($title);

			$this->seo->setKeyword($keyword." ".$title);

			$this->seo->setDescription($keyword." ".$title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();
			$this->data["seo"] = $this->seo->Meta(); 

		    $this->data["cls"] = "my-account-point";


	        $content = $this->load->view("product/account/my-account-point",array("user"=>$this->user),true); 
	        $title = "My points";


	        $this->data["content"] = $this->load->view("product/account/template",array("title"=>$title,"user"=>$this->user,"content"=>$content),true); 

	        //load theme

	        $this->showTemplate($this->data);
		}
	}
    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
    public function import($to){

	}

	public function export($to){

	}
}