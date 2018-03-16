<?php
  /**
  * Slideshow File Service
  */
    class Slideshow_Service extends Media_Service{
        
        public function __construct(){
            //print_r($this);
        }
        
        
        ////overload
		public function index(){
		   echo get_class();
		}
		
		public function insertSlide(){
			$ahlu  = $this->ahlu;
			$slideshow = $this->load->model("media/slideshow_modul");
			//set the name
			$slideshow->name = THEME."_slideshow_ahlu";

			$arr = array(
				"info"=>$this->ahlu->img["info"],
				"caption"=>$this->ahlu->img["description"],
				"name"=>isset($this->ahlu->img["name"])?$this->ahlu->img["name"] : "name_slide_".time(),
				"url"=>isset($this->ahlu->img["link"])?$this->ahlu->img["url"] : "#",
				"alternative"=>isset($this->ahlu->img["alternative"])?$this->ahlu->img["alternative"] : ""
			);
			
			$a = $slideshow->insertSlide($arr,$this->ahlu->id_cate);
			if($a>0){
				//insert meta
				if(isset($ahlu->meta)){
					$meta = json_decode($ahlu->meta);
					if(count($meta)>0){
						foreach($meta as $item){
							//insert
							$slideshow->insert_meta_key( preg_replace('/[\s\-!\?]/is',"_",strtolower($item->key)),$item->value,$a);
						}
					}
				}
			}
		    return $a;
		}
		
		
		public function deleteSlide(){
			$ahlu  = $this->ahlu;
			$media = new Media_Model();
			if(isset($ahlu->id_media)){
				 return $media->delete(array("id_media"=>$ahlu->id_media));
			}
		    $this->isRendered = true;
			echo "Cannot delete this slide because of no id found.";
		}
		public function insertMetaMedia(){
			$ahlu= $this->ahlu;
			$media = new Media_Model();

			return $media->insert_meta_key( preg_replace('/[\s\-!\?]/is',"_",strtolower($ahlu->key)),$ahlu->value,$ahlu->id_media);
			
		}
		public function deleteMetaMedia(){
			  $ahlu= $this->ahlu;
			$media = new Media_Model();

			return $media->delete_meta_key($ahlu->id_media);
		}
		public function updateInfo(){
			$ahlu= $this->ahlu;
			$media = new Media_Model();
			
			//print_r($ahlu);
			//die();
			$a = $media->update(array("caption"=>$ahlu->description,"alternative"=>$ahlu->alternative,"url"=>$ahlu->url,"name"=>$ahlu->name),array("id_media"=>$ahlu->id_media));
		
			if($a){
				//insert meta
				if(isset($ahlu->meta)){
					$meta = json_decode($ahlu->meta);
					if(count($meta)>0){
						foreach($meta as $item){
							//insert
							$media->insert_meta_key( preg_replace('/[\s\-!\?]/is',"_",strtolower($item->key)),$item->value,$ahlu->id_media);
						}
					}
				}
			}
			return $a;
		}	
		/*
		* Insert slideshow
		*/
		public function insert(){

			$ahlu  = $this->ahlu;
			$slideshow = $this->load->model("media/slideshow_modul");

			//set the name
			$slideshow->name = THEME."_slideshow_ahlu";
			//check item slide exist
			//if(!$this->checkItem(array("nameCategory"=>$ahlu->name))){
				
			//}
			$arr = array(
				"nameCategory"=>$ahlu->name,
				"descriptionCategory"=>$ahlu->name." slideshow"
			);
		    return $slideshow->insert($arr);
		}
		/*
		* delete slideshow
		*/
		public function delete(){
		   $ahlu  = $this->ahlu;
		   $slideshow = $this->load->model("media/slideshow_modul");
		   
		   if(intval($ahlu->id))
			return $slideshow->delete(array("id_category"=>$ahlu->id));
			
		   return 0;
		}
		/////        
    }
?>