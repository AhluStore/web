<?php if ( ! defined('DOMAIN')) exit('No direct script access allowed');

class alibaba_Product extends AhluFrontend {

     public function __construct(){

         parent::__construct();
		
		$this->post_type = "product";
    }

	public function index()
	{   
		$category = ahlu_e_top_categories();

	    //show breadCrumbs and override breadCrumbs
		$breadCrumbs =  array(array("title"=>"Shop","slug"=>"#"));
		//override breadcrumb system
		AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
			$a = array('<li><a href="'.site_url().'" title="Home">Home</a></li>');
			
			$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
			foreach($breadCrumbs as $item){
				if(isset($item["active"]) && $item["active"])

					$a[] = '<li><span title="'.$item["title"].'" class="active">'.$item["title"].'</span><li>';

				else

					$a[] = '<li><a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a></li>';

			}
			$s=implode("\n",$a);
			return <<<AHLU
				<ul class="breadcrumb">{$s}</ul>
AHLU;

		},1);
		

		//load seo
		$title = website_title("Shop");

		$keyword =Ahlu_Settings("seo_keyword");
	    $this->seo->setTitle($title);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		$this->data["seo"] = $this->seo->Meta(); 

	    $this->data["cls"] = "shop shop-index";

        $this->data["content"] = $this->load->view("product/tmdt_product_shop",array("title"=>$title),true); 


        //load theme

        $this->showTemplate($this->data); 
	} 




	public function post($id=null)
	{
		//check id
		if(empty($id)){
			//404
			$this->redirect(404,$params=array("error"=>"Page Not Found"));
		}

		
		//load post
		$post =Ahlu_Get_Product($id);
		if(!$post){
			ahlu_show_error(array("msg"=>"Page Not Found"));
		}
		
		//
		$product =  Ahlu_E_Product($post);
	
        //assign data
		AhluURL::Data("post",(array)$post);


		//get package type for this cart
		define("TYPE_PRODUCT",$post->type_product);
		$breadCrumbs = category_breadCrumb($post->id_category,table_prefix("product_category"),array("id"=>"id_category","parent"=>"id_parent","value"=>"name_category","url"=>"cate_url"));
		if($breadCrumbs){
			foreach ($breadCrumbs as $key => $value) {
				$breadCrumbs[$key]["slug"] = site_url_e_category($value["slug"]);
			}
		} 
		array_unshift($breadCrumbs,array("title"=>"Shop","slug"=>"shop"));
		array_unshift($breadCrumbs,array("title"=>"home","slug"=>site_url()));
		$breadCrumbs[] = array("title"=>$post->title,"slug"=>site_url_ahlu_e_product($post->url));
		

		AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links) use($breadCrumbs){	
			$str = "";
			
			foreach($breadCrumbs as $i=> $item){
				if($i==count($breadCrumbs)-1){
					$str.= '<li><a href="#" class="homepage-link">'.$item["title"].'</a></li>';
				}else{
					$str.= '<li><a href="'.$item["slug"].'" class="homepage-link">'.$item["title"].'</a></li>';
				}
			}
			return '<ul class="breadcrumb">'.$str.'</ul>';
		},1);

		if(isset($_GET["detail"])){
			echo  $this->load->view("product/tmdt_product_post_quickview",array("product"=>$product),true);
			AhluFlow()->trigger("onExit");
		}else{
			//load SEO
			$page = __FUNCTION__; 
			$title = meta_key_option("title_website");

			$keyword =meta_key_option("keyword");

		    $this->seo->setTitle("Home - {$post->title}");

			$this->seo->setKeyword($keyword." ".$post->title);

			$this->seo->setDescription($keyword." ".$post->title);

			$this->seo->setLanguage(LANG);

			$this->seo->setCharset("utf-8");

			$this->seo->setRobot("index, follow");

			$this->seo->enableMobil();


			$this->data["cls"] = "product product-id-{$id} {$post->url} ".$product->className();
		    $this->data["seo"] = $this->seo->Meta();
			$this->data["content"] = $this->load->view("product/tmdt_product_post",array("post"=>$post,"product"=>$product),true);
			
		}

		
		//load theme
        $this->showTemplate($this->data);
	} 

	public function category($id)
	{   
	    if(is_array($id)){
			$category = $id;
			$id = $category["id_category"];
		}
		$category = AhluEntity("product_category");
		

		if(!$category->exist_id_category_or_cate_url($id,$id)){
			ahlu_show_error("Can not find category");
		}

		$id = $category->id_category;
		 //assign data
		AhluURL::Data("category",(array)$category->Data());

	    //show breadCrumbs and override breadCrumbs


		$breadCrumbs = category_breadCrumb($id,table_prefix("product_category"),array("id"=>"id_category","parent"=>"id_parent","value"=>"name_category","url"=>"cate_url"));
		$before_cate = $breadCrumbs;
		
		if(count($breadCrumbs)>1){
			$breadCrumbs[] = array("id"=>$id,"title"=>$category->name_category,"slug"=>site_url_e_category($category->cate_url));
		}
		array_unshift($breadCrumbs,array("title"=>"Shop","slug"=>"shop"));
		array_unshift($breadCrumbs,array("title"=>"home","slug"=>""));
		


		
		//config
		$display = product_config("_category_display");


		$categories = ahlu_e_top_categories();

	    //show breadCrumbs and override breadCrumbs
		//override breadcrumb system
		AhluOverride()->add("ahlu_breadcrumb",function($seperate,$links)use($breadCrumbs){	
			$a = array();
			
			$breadCrumbs[count($breadCrumbs)-1]["active"]=true;
			foreach($breadCrumbs as $item){
				if(isset($item["active"]) && $item["active"])

					$a[] = '<li><span title="'.$item["title"].'" class="active">'.$item["title"].'</span><li>';

				else

					$a[] = '<li><a href="'.site_url($item["slug"]).'" title="'.$item["title"].'">'.$item["title"].'</a></li>';

			}
			$s=implode("\n",$a);
			return <<<AHLU
				<ul class="breadcrumb">{$s}</ul>
AHLU;

		},1);
		

		//load seo
		$title = $category->name_category;

		$keyword =Ahlu_Settings("seo_keyword");
	    $this->seo->setTitle($title);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		$this->data["seo"] = $this->seo->Meta(); 

	    $this->data["cls"] = "category category-{$id}";

        $this->data["content"] = $this->load->view("product/tmdt_product_shop",array("category"=>(object)$category->Data(),"title"=>$title),true); 


        //load theme

        $this->showTemplate($this->data); 
	}
	

	public function search($qry)
	{   

		$qry = rawurldecode($qry);
	    //show breadCrumbs and override breadCrumbs
		$breadCrumbs =  array(array("title"=>"Tìm kiếm '{$qry}'","slug"=>"#"));
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
		$title = "Tìm kiếm '{$qry}'";

		$keyword =Ahlu_Settings("seo_keyword");
	    $this->seo->setTitle($title);

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
		$this->data["seo"] = $this->seo->Meta(); 

	    $this->data["cls"] = "search search-index";


	    $products = null;

        $this->data["content"] = $this->load->view("product/tmdt_product_search",array("products"=>null,"title"=>$title,"qry"=>$qry),true); 


        //load theme

        $this->showTemplate($this->data); 
	} 



	public function archieve($year=0,$month=0,$date=0)

	{      



	   $this->data["header"] = $this->load->view("component/header",array(),true); 

       $this->data["content"] = $this->load->view("product/tmdt_product_archieve",array(),true); 

       //load theme



       $this->showTemplate($this->data); 

	} 

    /////////////////////Checkout//////////////////////
   	public function cart($id=null){
		
		$user = current_user();
		
		$page = __FUNCTION__; 
		$title = meta_key_option("title_website");

		$keyword =meta_key_option("keyword");

	    $this->seo->setTitle("Cart - {$title}");

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
	    $this->data["seo"] = $this->seo->Meta();

		$this->data["cls"] = "cart cart_simple"; 
		$view = "cart";
		
		//detach mobile

		if($this->isOnMobile()){

			$data = $this->dataPost("ahlu");

			$this->data["title"] = "Shopping Cart";

			$this->data["id_page"] = isset($data->id_page)?$data->id_page:"cart";

			$this->data["header"] = ""; 

			$this->data["content"] = $this->load->view("product/checkout/{$view}_mobile",array("isMobile"=>true,"id_page"=>$this->data["id_page"],"cart"=>$this->e_cart,"user"=>$user,"plugin"=>$this->plugin_e),true);  

			$this->data["footer"] = ""; 

			echo $this->load->view("mobile",$this->data,true);  

			die();

		}

		$breadCrumbs = array(array("id"=>456,"title"=>"Cart","slug"=>"cart"));

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

		$this->data["content"] = $this->load->view("product/checkout/{$view}",array("user"=>$user),true); 


		//load theme

        $this->showTemplate($this->data); 		

	}



	public function checkout(){

		$user = current_user();
		
		$page = __FUNCTION__; 
		$title = meta_key_option("title_website");

		$keyword =meta_key_option("keyword");

	    $this->seo->setTitle("Thanh toán");

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
	    $this->data["seo"] = $this->seo->Meta();

		$this->data["cls"] = "cart cart_simple"; 
		$view = "cart_simple";

		$breadCrumbs = array(array("id"=>456,"title"=>"Checkout","slug"=>"checkout"));

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

		$this->data["content"] = $this->load->view("product/checkout/tmdt_product_checkout",array(),true); 


		//load theme
        $this->showTemplate($this->data); 
	}

	/**
	*
	* Mesage invoice
	*/
	public function checkout_status($id,$status){
		//check id
		$detail_order = null;
		$title = "";


		if($id){
			$detail_order = new Ahlu_E_Order($id); 	
		}


		$page = __FUNCTION__; 
		$title = meta_key_option("title_website");

		$keyword =meta_key_option("keyword");

	    $this->seo->setTitle("{$status} Invoice - {$title}");

		$this->seo->setKeyword($keyword." ".$title);

		$this->seo->setDescription($keyword." ".$title);

		$this->seo->setLanguage(LANG);

		$this->seo->setCharset("utf-8");

		$this->seo->setRobot("index, follow");

		$this->seo->enableMobil();
	    $this->data["seo"] = $this->seo->Meta();

		$this->data["cls"] = "invoice-{$status}-message"; 
		
		$breadCrumbs = array(array("id"=>456,"title"=>"Welcome {$status}","slug"=>"#"));

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
		
		$this->data["content"] = $this->load->view("product/checkout/invoice_message",array("status"=>$status,"invoice"=>$detail_order),true); 


		//load theme
        $this->showTemplate($this->data); 	
	}
	public function checkout_item_ordered($id=null){

		//check Ajax

		$post = $this->IsAJAX();
		if($post){
			$ahlu = null;
			$this->dataOutput($ahlu);
		}

		//////////////here we go
		$seo = new Ahlu_SEO();
		if(empty($id)){
			/////
			$this->direct404(array("error"=>"Can not find the item order. Please try agian."));
			return;
		}

		$this->load->model(ROOT_E."/core/app/model/order_modul");
		//chek order

		$order = $this->order->info($id);
		if($order==null)
		{
			$this->direct404(array("error"=>"The order is not exist. Please try agian."));
			return;
		}	

		$user = current_user();
		//if not exist on current product
		$title = $this->option->item("title_website")->value;
		$keyword = $this->option->item("keyword")->value;


		$seo->setTitle("Review {$this->order->code}");
		$seo->setKeyword($keyword." ".$title);
		$seo->setDescription($keyword." ".$title);
		$seo->setLanguage($this->short_lang);
		$seo->setCharset("utf-8");
		$seo->setRobot("index, follow");
		$seo->enableMobil();

	    $this->data["seo"] = $seo->Meta();
		$this->data["cls"] = "review-order review-order-{$id} review-order-{$this->order->code}"; 
		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 

		$this->data["header"] = $this->load->view("component/header",array(),true); 

		$this->data["content"] = $this->load->view("product/checkout/tmdt-product-review-order-payment",array("user"=>$user,"order"=>$order,"settings"=>$this->plugin_e),true); 

        $this->data["footer"] = $this->load->view("component/footer",array(),true);

     //load theme

       $this->showTemplate($this->data); 

	}

	public function review_order($id=null){



		//check Ajax



		$post = $this->IsAJAX();



		if($post){



			$ahlu = null;



			$this->dataOutput($ahlu);

		}

		//////////////here we go
		$seo = new Ahlu_SEO();
		if(empty($id)){
			/////
			echo "Can not find the item order. Please try agian.";
			return;
		}

		$this->load->model(ROOT_E."/core/app/model/order_modul");
		//chek order

		$order = $this->order->info($id);
		if($order==null)
		{
			echo "the order is not exist. Please try agian.";
			return;
		}	

		$user = current_user();
		//if not exist on current product
		$title = $this->option->item("title_website")->value;
		$keyword = $this->option->item("keyword")->value;


		$seo->setTitle("Review {$this->order->code}");
		$seo->setKeyword($keyword." ".$title);
		$seo->setDescription($keyword." ".$title);
		$seo->setLanguage($this->short_lang);
		$seo->setCharset("utf-8");
		$seo->setRobot("index, follow");
		$seo->enableMobil();

	    $this->data["seo"] = $seo->Meta();
		$this->data["cls"] = "review-order review-order-{$id} review-order-{$this->order->code}"; 
		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 

		$this->data["header"] = $this->load->view("component/header",array(),true); 

		$this->data["content"] = $this->load->view("product/checkout/tmdt-product-review-order",array("user"=>$user,"order"=>$order,"settings"=>$this->plugin_e),true); 

        $this->data["footer"] = $this->load->view("component/footer",array(),true);

     //load theme

       $this->showTemplate($this->data); 

	}



	public function cancel_order($id=null){



		//check Ajax

		$this->data[] = array();

		

		$post = $this->IsAJAX();



		if($post){



			$ahlu = null;



			$this->dataOutput($ahlu);



		}



		



		//////////////here we go



		$seo = new Ahlu_SEO();



		



		if(empty($id)){



			/////



			echo "Can not cancel the order '{$id}'. Please try agian.";



			return;



		}



		



		$this->load->model(ROOT_E."/core/app/model/order_modul");



		//chek order



		if(!$this->order->load($id))



		{



			echo "the order is not exist. Please try agian.";



			return;



		}	



		//



		if(!$this->order->cancel()){



			echo "Can not cancel the order '{$id}'. Please try agian.";



			return;



		}



		



		//if not exist on current product



		$title = $this->option->item("title_website")->value;



		$keyword = $this->option->item("keyword")->value;



			



		



		$seo->setTitle("Review {$this->order->code}");



		$seo->setKeyword($keyword." ".$title);







		$seo->setDescription($keyword." ".$title);



		$seo->setLanguage($this->short_lang);

		$seo->setCharset("utf-8");

		$seo->setRobot("index, follow");

		$seo->enableMobil();



		



	    $this->data["seo"] = $seo->Meta();

		$this->data["cls"] = "review-order review-order-{$id} review-order-{$this->order->code}"; 

		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 

		$this->data["header"] = $this->load->view("component/header",array(),true); 



		$this->data["content"] = $this->load->view("product/checkout/tmdt-product-cancel-order",array("order"=>$this->order->order),true); 



        $this->data["footer"] = $this->load->view("component/footer",array(),true);



     //load theme



       $this->showTemplate($this->data); 



	}



	public function checkout_item($id=null){



	



		//check Ajax



		$post = $this->IsAJAX();



		if($post){



			$ahlu = null;



			$this->dataOutput($ahlu);



		}



		



		



		//////////////here we go



		$seo = new Ahlu_SEO();



		



		if(empty($id)){



			/////



			echo "Can not find the item product. Please try agian.";



			return;



		}



		



		$this->load->model(ROOT_E."/core/app/model/order_modul");



		



		$this->product->loadPost($id);



		//if not exist on current product



		$title = $this->option->item("title_website")->value;



		$keyword = $this->option->item("keyword")->value;



		







		//check the package depends on Cart



		//get package type for this cart



		$view = "";



		$config_e = config()->get("e");



		if($config_e){



			$view = "_{$config_e["type"]}";



		}



		



		if($this->product->product==null){



			$this->data["content"] = $this->load->view("product/checkout/tmdt_product_checkout_item_none",array("product"=>null,"settings"=>$this->plugin_e),true); 



				



		}else{



			$this->data["content"] = $this->load->view("product/checkout/tmdt_product_checkout_item{$view}",array("product"=>$this->product->product,"order"=>$this->order,"settings"=>$this->plugin_e),true); 



			$seo->setTitle("Checkout Item");



			$seo->setKeyword($keyword." ".$title);







			$seo->setDescription($keyword." ".$title);



			$seo->setLanguage($this->short_lang);



			$seo->setCharset("utf-8");



			$seo->setRobot("index, follow");



			$seo->enableMobil();



		}











		



	    $this->data["seo"] = $seo->Meta();



		$this->data["cls"] = "checkout checkout-{$id}"; 



		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 



		$this->data["header"] = $this->load->view("component/header",array(),true); 



        $this->data["footer"] = $this->load->view("component/footer",array(),true);



     //load theme



       $this->showTemplate($this->data); 



	}



    /////////////////////////////////////////User/////////////////////



	public function user($query=null){







		//check if request mvcJS is enbled      



        //check is mvcJS



       if ($this->enableMVCJS) {



         ob_start();



         header('content-type: application/json; charset=utf-8');



         header("access-control-allow-origin: *");



         $ahlu = new stdClass();



         $ahlu->html = $this->load->view("tmdt_home_index",array(),true);  



         



         die(json_encode(array('d' =>$ahlu)));



       }







		//get all router url



		$view_order = $this->plugin_e->account_config("_my_account_view_order");



		$user = $this->plugin_e->account_config("_my_account");



		$tracking_order = $this->plugin_e->account_config("_tracking_order");



		$lost_password = $this->plugin_e->account_config("_my_account_lost_password");



		$wishlist = $this->plugin_e->account_config("_my_account_wishlist");



		$logout = $this->plugin_e->account_config("_logout");



		$message = $this->plugin_e->account_config("_my_account_message");



		



		if(preg_match("/^user-order-?(.*)/is",$query,$m)){



			$this->order_list();



		}else if(preg_match("/^{$wishlist}-?(.*)/is",$query,$m)){



			$this->wishlist();



		}else if(preg_match("/^{$view_order}-?(.*)/is",$query,$m)){



			$this->process_order($m[1]);



		}else if(preg_match("/^check-order-?(.*)/is",$query,$m)){



			$this->check_order(isset($_GET["id"])?$_GET["id"]:null);



		}else if(preg_match("/^history-?(.*)/is",$query,$m)){



			$this->user_history();



		}else if(preg_match("/^{$tracking_order}-?(.*)/is",$query,$m)){



			



		}else if(preg_match("/^{$lost_password}-?(.*)/is",$query,$m)){



			



		}else if(preg_match("/^{$logout}-?(.*)/is",$query,$m)){



			



		}else if(preg_match("/^{$message}-?(.*)/is",$query,$m)){



			



		}



		



		//default as my-account



		$user = current_user();



		



	



		//////////////here we go



		$seo = new Ahlu_SEO();



		



		//if not exist on current product



		$title = $this->option->item("title_website")->value;



		$keyword = $this->option->item("keyword")->value;



			



		



		$seo->setTitle("Account");



		$seo->setKeyword($keyword." ".$title);







		$seo->setDescription($keyword." ".$title);



		$seo->setLanguage($this->short_lang);



		$seo->setCharset("utf-8");



		$seo->setRobot("index, follow");



		$seo->enableMobil();



		



	    $this->data["seo"] = $seo->Meta();



		$this->data["cls"] = "account"; 



		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 



		



		$this->data["header"] = $this->load->view("component/header",array(),true); 



		$this->data["footer"] = $this->load->view("component/footer",array(),true);



		



		//default view for login



		$view = "-none";



		



		



		



		



		if($user){



			$content = $this->load->view("product/account/my-account",array("user"=>$user,"plugin"=>$this->plugin_e),true);



			$this->data["content"] = $this->load->view("product/account/template",array("user"=>$user,"plugin"=>$this->plugin_e,"title"=>"My Account","content"=>$content),true); 



		}else{



			$this->load->model(ROOT_E."/core/app/model/e_user_modul");



			$this->data["content"] = $this->load->view("product/account/register-and-login",array("plugin"=>$this->plugin_e),true); 



		}

		//load theme



       $this->showTemplate($this->data); 	



	}



	public function process_order($id=null){



		//check Ajax



		$post = $this->IsAJAX();



		if($post){



			$ahlu = null;



			$this->dataOutput($ahlu);



		}



		



		//////////////here we go



		$seo = new Ahlu_SEO();



		



		if(empty($id)){



			/////



			echo "Can not find the item order. Please try agian.";



			return;



		}



		$this->load->model(ROOT_E."/core/app/model/order_modul");



		//chek order



		$order = $this->order->info($id);



		



		if($order==null)



		{



			echo "the order is not exist. Please try agian.";



			die();



		}	



		



		$user = current_user();



		



		//if not exist on current product



		$title = $this->option->item("title_website")->value;



		$keyword = $this->option->item("keyword")->value;



			



		



		$seo->setTitle("Review {$this->order->code}");



		$seo->setKeyword($keyword." ".$title);







		$seo->setDescription($keyword." ".$title);



		$seo->setLanguage($this->short_lang);



		$seo->setCharset("utf-8");



		$seo->setRobot("index, follow");



		$seo->enableMobil();



		



	    $this->data["seo"] = $seo->Meta();



		$this->data["cls"] = "review-order review-order-{$id} review-order-{$this->order->code}"; 



		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 



		



		$this->data["header"] = $this->load->view("component/header",array(),true); 



		$this->data["content"] = $this->load->view("product/checkout/tmdt-product-process-order",array("user"=>$user,"order"=>$order,"plugin"=>$this->plugin_e),true); 



        $this->data["footer"] = $this->load->view("component/footer",array(),true);



     //load theme



       $this->showTemplate($this->data); 



	}



	public function user_history(){



        



		$user = current_user();







		$this->load->model(ROOT_E."/core/app/model/e_user_modul");



		



		//////////////here we go



		$seo = new Ahlu_SEO();



		



		//if not exist on current product



		$title = $this->option->item("title_website")->value;



		$keyword = $this->option->item("keyword")->value;



			



		



		$seo->setTitle("Account");



		$seo->setKeyword($keyword." ".$title);







		$seo->setDescription($keyword." ".$title);



		$seo->setLanguage($this->short_lang);



		$seo->setCharset("utf-8");



		$seo->setRobot("index, follow");



		$seo->enableMobil();



		



	    $this->data["seo"] = $seo->Meta();



		$this->data["cls"] = "account"; 



		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 



		



		$this->data["header"] = $this->load->view("component/header",array(),true); 



		$this->data["content"] = $this->load->view("product/account/template",array("user"=>$user,"plugin"=>$this->plugin_e,"title"=>"Your History","content"=>$this->load->view("product/account/my-account-history",array("user"=>$user,"plugin"=>$this->plugin_e),true)),true); 



		$this->data["footer"] = $this->load->view("component/footer",array(),true);



		//load theme



       $this->showTemplate($this->data); 	       



	}



	public function order_list($id=null){



        



		$user = current_user();







		$this->load->model(ROOT_E."/core/app/model/e_user_modul");



		



		//////////////here we go



		$seo = new Ahlu_SEO();



		



		//if not exist on current product



		$title = $this->option->item("title_website")->value;



		$keyword = $this->option->item("keyword")->value;



			



		



		$seo->setTitle("Account");



		$seo->setKeyword($keyword." ".$title);







		$seo->setDescription($keyword." ".$title);



		$seo->setLanguage($this->short_lang);



		$seo->setCharset("utf-8");



		$seo->setRobot("index, follow");



		$seo->enableMobil();



		



	    $this->data["seo"] = $seo->Meta();



		$this->data["cls"] = "account"; 



		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 



		



		$this->data["header"] = $this->load->view("component/header",array(),true); 



		$this->data["content"] = $this->load->view("product/account/template",array("user"=>$user,"order="=>null,"plugin"=>$this->plugin_e,"title"=>"Orders History","content"=>$this->load->view("product/account/my-account-order",array("user"=>$user,"order="=>null,"plugin"=>$this->plugin_e),true)),true); 



		$this->data["footer"] = $this->load->view("component/footer",array(),true);



		//load theme



       $this->showTemplate($this->data); 	       



	}


	public function check_order($id=null){







		$user = current_user();







		$this->load->model(ROOT_E."/core/app/model/e_user_modul");



		



		//////////////here we go



		$seo = new Ahlu_SEO();



		



		//if not exist on current product



		$title = $this->option->item("title_website")->value;



		$keyword = $this->option->item("keyword")->value;



			



		



		$seo->setTitle("Account");



		$seo->setKeyword($keyword." ".$title);







		$seo->setDescription($keyword." ".$title);



		$seo->setLanguage($this->short_lang);



		$seo->setCharset("utf-8");



		$seo->setRobot("index, follow");



		$seo->enableMobil();



		



		



		



		$view = "my-account-order";



		//check order



		if($id!=null){



			//check id order exist



			$content = $this->load->view("product/account/template",array("user"=>$user,"order="=>null,"plugin"=>$this->plugin_e,"title"=>"Check item","content"=>$this->load->view("product/account/my-account-order-item",array("user"=>$user,"order="=>null,"plugin"=>$this->plugin_e),true)),true); 



		}else{



		



			$content = $this->load->view("product/account/template",array("user"=>$user,"order="=>null,"plugin"=>$this->plugin_e,"title"=>"Check item","content"=>$this->load->view("product/account/my-account-check-order",array("user"=>$user,"order="=>null,"plugin"=>$this->plugin_e),true)),true); 



		}



		



		



		



		//



		$this->data["content"] = $content;



		



	    $this->data["seo"] = $seo->Meta();



		$this->data["cls"] = "account"; 



		$this->data["isMobile"] = $this->isOnMobile()?"isMobile":""; 



		



		$this->data["header"] = $this->load->view("component/header",array(),true); 







        $this->data["footer"] = $this->load->view("component/footer",array(),true);



		//load theme



       $this->showTemplate($this->data); 	       



	}



	



	



	public function recover_password(){



         $this->data["header"] = $this->load->view("component/header",array(),true); 



        $this->data["content"] = $this->load->view("product/tmdt_product_user_recover_password",array(),true); 



     //load theme



       $this->showTemplate($this->data);     



	}



	public function message(){



          $this->data["header"] = $this->load->view("component/header",array(),true); 



        $this->data["content"] = $this->load->view("product/tmdt_product_user_recover_message",array(),true); 



     //load theme



       $this->showTemplate($this->data);        



	}



	



    //////////////////////////////////////////////////////////////



    //////////////////////////////////////////////////////////////



    public function import($to){



            



	}







	public function export($to){



		



	}







    



}