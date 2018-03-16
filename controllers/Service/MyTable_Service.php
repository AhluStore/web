<?php
  /**
  * Gallery File
  */
    class MyTable_Service extends Datatable_Service{
        //store all fields in specific table
		protected $tables_info = array();
		protected $columns = array();
		protected $post_type = "page";

		
		
		protected $iColumns = null;
		protected $requestPage = null;
		protected $iDisplayStart = null;
		protected $iDisplayLength = null;
		protected $limit = null;
		
		protected $sSearch = null;
		//column to sort
		protected $coltoSearch = null;
		//sort by
		protected $sSortDir_0 = null;
		
        public function __construct(){
			parent::__construct();
		    //output directly
            $this->isRendered = true;
			
        }
        
        
        ////implement and override
        public function index(){
            echo parent::index();
        }
		
		//enforce to know
		public function pageTable(){
		   $ahlu = $this->initialize();
//print_r($this->config->item("seo_default"));
		   //check status
		   if(!isset($this->ahlu->stat)){
		   		//throw error

		   }
		  
			try{
				// get app
				$app = mysql_escape_string($this->ahlu->app);
				//
				$tableWith = "";
				$takeMore = "";
				$url = isset($this->ahlu->c_url)?$this->ahlu->c_url:"/";

				$post_type = sprintf(" and post.post_type='%s'",THEME."_".$this->post_type);
				//check whether use external table with ref
				$external = false;

				if(isset($this->ahlu->with)){
					if(isset($this->ahlu->with)){
					
						$realTB = $this->findTable($this->ahlu->with);
						if($this->hasTable($realTB)){
							//get all columns
							$cols  = $this->getColumnsFull($realTB,"id_post");
							
							//depend on new table with id_post;
								$post_type = " join {$realTB} on {$realTB}.id_post=post.id_post";
								$takeMore = ",{$cols}";
								$external = true;
						}else{
									 //depend on post_type
							$post_type = sprintf(" and post.post_type='%s'",$this->ahlu->with);
						}
					
					}else{
						//depend on post_type
						$post_type = sprintf(" and post.post_type='%s'",$this->ahlu->with);
					}
				}
				$status = mysql_escape_string($this->ahlu->stat);
				//print_r($this->ahlu);
				$sort = "";
				if(!empty($this->coltoSearch)){
					$sort = "order by ".$this->coltoSearch." ".$this->sSortDir_0;
				}
				//search 
				$search ="";
				if(!empty($this->sSearch)){
					$search = $this->sSearch;
				}
				$t_category = table_prefix("category");
				$t_slug = table_prefix("slug");
				$t_post = table_prefix("post");
				$t_metapost = table_prefix("metapost");

				//category
				$categoryStr =""; 
				 
				if(in_array("category", $this->columns)){
					$categoryStr = " left join (Select cate.nameCategory,cate.id_category,slug.url as cate_url from {$t_category} cate join {$t_slug} as slug on cate.id_slug=slug.id_slug where slug.status='{$status}') category on p.id_category=category.id_category";
				}else{
					$categoryStr = $this->joinLeft("id_category","category","p");
				}
				//we need to get columns
				
				/*
				$query = " SELECT SQL_CALC_FOUND_ROWS category.*,slug.*,p.*,user.username,metap.meta FROM (SELECT post.*".(!empty($takeMore)?"{$takeMore}":"")." FROM {$t_post} post {$post_type}) as p 
					left join ( SELECT group_concat(meta SEPARATOR '\$ahlu\$') as meta,mp.ID  from (
						SELECT
							CASE meta_value
								WHEN  NULL THEN CONCAT(id_metaPost,'=',meta_key, '=', 'null')
				   ELSE CONCAT(id_metaPost,'=',meta_key, '=', meta_value)
							END AS meta,id_post as ID
						FROM {$t_metapost}
					) as mp GROUP BY ID ) as metap on p.id_post=metap.ID ".$this->joinLeft("id_user","user","p")." ".$categoryStr." join {$t_slug} as slug on slug.id_slug=p.id_slug where slug.status='{$status}' ".(empty($search)?"":" and {$search}")." {$sort} {$this->limit}";
				*/
				
$query = "SELECT SQL_CALC_FOUND_ROWS post.* from {$this->db->view_route_post} post where status='{$status}' {$post_type}".(empty($search)?"":" and {$search}")." {$sort} {$this->limit}";				
					
			
				$rs = $this->db->query($query);
				$total_records = $this->db->query("SELECT FOUND_ROWS() as rows");
				
				//set total count
				$total_count_trash = $this->db->query("SELECT  count(id_post) as total from {$this->db->view_route_post} post where status='trash'");
				$total_count_publish = $this->db->query("SELECT  count(id_post) as total from {$this->db->view_route_post} post where status='publish'");
				
				$ahlu->total_count_publish = $total_count_publish->row()->total;
				$ahlu->total_count_trash = $total_count_trash->row()->total;
				$ahlu->total_count_all = intval($ahlu->total_count_publish)+intval($ahlu->total_count_trash);
				
				$ahlu->iTotalRecords = $total_records->row()->rows;
				$ahlu->iTotalDisplayRecords = $ahlu->iTotalRecords;
				if($rs->num_rows() > 0){
					$rs = $rs->result_array();
					//print_r($rs);
					//die();
					foreach($rs as $i=> $obj){
						//
						
						$obj["content"] = String::truncateString(rawurldecode(str_replace("\r","",str_replace("\n","",$obj["content"]))),150);
						$obj["title"] = ucfirst($obj["title"]);
						$obj["excerpt"] = strip_tags($obj["excerpt"]);
						
						if(isset($obj["cate_url"])){
							$obj["cate_url"] = $obj["cate_url"];
							$obj["nameCategory"] = $obj["nameCategory"];
						}
						//$rs[$i] = $obj;
						if(!empty($obj["meta"])){
							$temps = explode("\$ahlu\$",$obj["meta"]);
							foreach($temps as  $v){
								$k=explode("=",ltrim($v,"_"));
								$obj[$k[1]] = decode_key_value(!empty($k[2]) ? (String::is_serial($k[2]) ? unserialize($k[2]) : $k[2] ) :null);
							}
							unset($rs[$i]["meta"]);
						}
						
						//update
						$rs[$i] = $obj;
					}

					//$this->tables_info[$tb] = array();
					foreach($rs as $j=> $arr){
						$obj = new stdClass();
						$obj->DT_RowId = $j;
						foreach($this->columns as $i=> $c){
							if($c=="action_column"){
								$obj->{$c} = '<a href="'.$url.'/edit/'.$arr["id_post"].'" class="editor_edit">Edit</a> / <a href="'.$url.'/delete/'.$arr["id_slug"].'" data-action="delete" class="editor_remove">Delete</a>';
							}else if($c=="check_item"){
								$obj->{$c} = '<input type="checkbox" value="'.$arr["id_slug"].'" class="check_item" />';
							}else if($c=="post_title"){
								$obj->{$c} = '<a href="'.$url.'/edit/'.$arr["id_post"].'">'.$arr["post_title"].'</a>';
								$obj->{$c} .= (isset($this->ahlu->shortcut) && $this->ahlu->shortcut=="post_title") ?'
									<div class="row-actions" style="margin-top: 10px;display:none;"><span class="edit"><a href="'.$url.'/edit/'.$arr["id_post"].'" title="Edit this item">Edit</a> | </span><span class=""><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="'.$url.'/trash/'.$arr["id_slug"].'">Trash</a> | </span><span class="view"><a href="'.DOMAIN."/".$arr["url"].".".SEO.'" target="_blank" title="View “Admission”" rel="permalink">View</a></span></div>
								' :"";
							}else if($c=="category" && isset($arr["cate_url"])){

								$obj->{$c} = '<a href="'.$url.'/'.$arr["cate_url"].'" alt="'.$arr["nameCategory"].'" title="'.$arr["nameCategory"].'">'.$arr["nameCategory"].'</a>';

							}else if($c=="feature_image"){
								$o = $arr["feature_image"];
								//die();
								$img = site_url_upload((!isset($o->path) || empty($o->path) ? "uncategory.png": $o->path));
								$obj->{$c} = '<img title="'.$arr["nameCategory"].'" alt="'.$arr["nameCategory"].'" class="open_modal"  call-func="just_open_img" src="'.$img.'" height="75px" />';

							}else if($c=="featured"){
								
								$obj->{$c} = '<input '.(ord($arr[$c])?"checked":"").' onclick="(function(me){me.disabled=true;window.Ahlu.Utils.receiveFromURL(\''.site_url_ajax("update_field").'\',{id:\''.$arr["id_post"].'\',field:\''.$c.'\',value:me.checked?1:0},function(data){showMessageBar(data,2000);me.disabled=false;},true);})(this);" type="checkbox" name="'.$c.'" />';
							}else if($c=="id"){
								$obj->{$c} = $arr["id_post"];
							
							}else{
								if(isset($arr[$c])){
									$obj->{$c} = empty($arr[$c]) ? "" :strip_tags($arr[$c]);
								}
							}
						}
						$ahlu->aaData[] = $obj;
						
					}
					
				}
			}catch(Exception $e){
				$ahlu->error = $e->getMessage();
				$ahlu->id =1;
			}
			
			return json_encode($ahlu);
        }
		
		//enforce to know
		public function categoryTable(){
		   $ahlu = $this->initialize();

			try{
				$id_app = isset($this->ahlu->app)?$this->ahlu->app:"";
				$url = isset($this->ahlu->c_url)?$this->ahlu->c_url:"/";
				$status = escape_string($this->ahlu->stat);
				$token_id = explode("-",$this->ahlu->token_id);
				
				$idCate =  escape_string($token_id[0]);
				//print_r($this->ahlu);
				$sort = "";
				if(!empty($this->coltoSearch)){
					$sort = "order by ".$this->coltoSearch." ".$this->sSortDir_0;
				}
				//search 
				$search ="";
				if(!empty($this->sSearch)){
					$search = $this->sSearch;
				}
				//we need to get columns
				$query = "select SQL_CALC_FOUND_ROWS * from {$this->db->view_route_category} where status={$status} and id_term={$idCate} and id_app={$id_app} ".(empty($search)?"":" and $search")." $sort {$this->limit}";

				$rs = $this->db->query($query);
				$total_records = $this->db->query("SELECT FOUND_ROWS() as rows");
				//set total

				$ahlu->iTotalRecords = $total_records->row()->rows;
				$ahlu->iTotalDisplayRecords = $ahlu->iTotalRecords;
				if($rs->num_rows() > 0){
					$rs = $rs->result_array();

					foreach($rs as $i=> $obj){
						//
						
						$obj["descriptionCategory"] = String::truncateString(html_entity_decode(str_replace("\r","",str_replace("\n","",$obj["descriptionCategory"]))));
						$obj["nameCategory"] = ucfirst($obj["nameCategory"]);

						$temps = explode("\$ahlu\$",$obj["meta"]);
						if(count($temps)>0){
							foreach($temps as  $v){
								$k=explode("=",ltrim($v,"_"));
								if(isset($k[1]))
									$obj[$k[1]] = decode_key_value(!empty($k[2]) ? (String::is_serial($k[2]) ? unserialize($k[2]) : $k[2] ) :null);
							}
						}
						unset($obj["meta"]);
						
						//update
						$rs[$i] = $obj;
					}

					
					//$this->tables_info[$tb] = array();
					$keys = array_keys($this->columns);
					foreach($rs as $j=> $arr){
						$obj = new stdClass();
						$obj->DT_RowId = $j;
						foreach($this->columns as $i=> $c){
							if($c=="action_column"){
								$obj->{$c} = '<a href="?edit='.$arr["id_category"].'" data-item=\''.json_encode(array("id_parent"=>$arr["id_parent"],"name"=>$arr["nameCategory"],"lang"=>$arr["alias"],"url"=>$arr["url"],"id_slug"=>$arr["id_slug"],"description"=>$arr["descriptioncategory"],"id_category"=>$arr["id_category"],"id_parent"=>$arr["id_parent"],"feature_image"=>in_array("feature_image",$keys)?(isset($arr["feature_image"])?$arr["feature_image"]:""):"")).'\' class="editor_edit">Edit</a> / <a href="?delete='.$arr["id_category"].'"  data-item=\''.json_encode(array("id_category"=>$arr["id_category"],"id_slug"=>$arr["id_slug"])).'\' class="editor_remove" data-action="delete">Delete</a>';
							}else if($c=="check_item"){
								$obj->{$c} = '<input type="checkbox" value="'.$arr["id_category"].'" class="check_item" />';
							}else if($c=="nameCategory"){
								$obj->{$c} = '<a class="pointer" href="?edit='.$arr["id_category"].'">'.$arr["nameCategory"].'</a>';
								$obj->{$c} .= (isset($this->ahlu->shortcut) && $this->ahlu->shortcut=="nameCategory") ?'
									<div class="row-actions" style="margin-top: 10px;display:none;"><span class="edit"><a href="'.$url.'/edit/'.$arr["id_category"].'" title="Edit this item">Edit</a> | </span><span class=""><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="'.$url.'/trash/'.$arr["id_category"].'">Trash</a> | </span><span class="view"><a href="'.DOMAIN."/".$arr["url"].'.'.SEO.'" target="_blank" title="View “Admission”" rel="permalink">View</a></span></div>
								' :"";
							}else if($c=="feature_image"){
								$o = json_decode($arr["feature_image"]);
								//die();
								$img = "/ahlustream/".(!isset($o->path) || empty($o->path) ? "uncategory.png": $o->path);
								$obj->{$c} = '<img title="'.$arr["nameCategory"].'" alt="'.$arr["nameCategory"].'" class="open_modal"  call-func="just_open_img" src="'.$img.'" height="75px" />';
							}else{
								if(isset($arr[$c])){
									$obj->{$c} = empty($arr[$c]) && $arr[$c]!=0 ? "n/a" :strip_tags($arr[$c]);
								}
							}
						}
						$ahlu->aaData[] = $obj;
						
					}
					
				}
			}catch(Exception $e){
				$ahlu->error = $e->getMessage();
				$ahlu->id =1;
			}
			
			return json_encode($ahlu);
        }
		
		//enforce to know
		public function pageUser(){
			
		    $ahlu = $this->initialize();
			
			
			try{
				$url = isset($this->ahlu->c_url)?$this->ahlu->c_url:"/";
				$status = mysql_escape_string($this->ahlu->stat);
				$token_id = explode("-",$this->ahlu->token_id);
				
				$id_role =  mysql_escape_string($token_id[0]);
				$where ="";
				
				if(!empty($id_role) && $id_role!="0"){
					$where =" where user.id_role={$id_role} and user.status='{$status}'";
				}else{
					$where =" where user.status='{$status}'";
				}	
				
				$more = "";
				$takeMore = "";
				if(isset($this->ahlu->with)){
					$realTB = $this->findTable($this->ahlu->with);
					if($this->hasTable($realTB)){
						//get all columns
						//$this->getColumns($realTB);
						
						$more = " join {$realTB} withTB on withTB.id_user=user.id_user";
						$takeMore = "withTB.*,";
					}

				}else{
					//no extra table
					$more = "join {$this->db->userrole} userrole on userrole.id_role = user.id_role";
					$takeMore = "userrole.*,";
				}
				
				
				
				//print_r($this->ahlu);
				$sort = "";
				if(!empty($this->coltoSearch)){
					$sort = "order by ".$this->coltoSearch." ".$this->sSortDir_0;
				}
				//search 
				$search ="";
				if(!empty($this->sSearch)){
					$search = $this->sSearch;
				}
				
				// get app
				$app = mysql_escape_string($this->ahlu->app);
				//we need to get columns
				$query = " SELECT SQL_CALC_FOUND_ROWS {$takeMore} user.*,metap.meta FROM  {$this->db->user} user  
					left join ( SELECT group_concat(meta SEPARATOR '\$ahlu\$') as meta,mp.id_user  from (
						SELECT
							CASE meta_value
								WHEN  NULL THEN CONCAT(id_metauser,'=',meta_key, '=', 'null')
				   ELSE CONCAT(id_metauser,'=',meta_key, '=', meta_value)
							END AS meta,id_user 
						FROM {$this->db->metauser}
					) as mp GROUP BY id_user ) as metap on user.id_user=metap.id_user join (select * from {$this->db->app} where name_app='{$app}') as app on  user.id_app=app.id_app {$more} {$where} ".(empty($search)?"":" and {$search}")." {$sort} {$this->limit}";

					
				//$query = "SELECT SQL_CALC_FOUND_ROWS {$takeMore} user.*"
				//echo $query;
				//die();
				$rs = $this->db->query($query);
				$total_records = $this->db->query("SELECT FOUND_ROWS() as rows");
				//set total
				//set total count
				$total_count_trash = $this->db->query(" SELECT count(user.id_user) as total FROM  {$this->db->user} user  join (select * from {$this->db->app} where name_app='{$app}') as app on  user.id_app=app.id_app join {$this->db->userrole} userrole on userrole.id_role = user.id_role where user.status='trash'");
				$total_count_publish = $this->db->query(" SELECT count(user.id_user) as total FROM  {$this->db->user} user  join (select * from {$this->db->app} where name_app='{$app}') as app on  user.id_app=app.id_app join {$this->db->userrole} userrole on userrole.id_role = user.id_role where user.status='publish'");
				$total_count_all = $this->db->query(" SELECT count(user.id_user) as total FROM  {$this->db->user} user  join (select * from {$this->db->app} where name_app='{$app}') as app on  user.id_app=app.id_app join {$this->db->userrole} userrole on userrole.id_role = user.id_role");
				
				$ahlu->total_count_publish = $total_count_publish->row()->total;
				$ahlu->total_count_all = $total_count_all->row()->total;
				$ahlu->total_count_trash = $total_count_trash->row()->total;
				$ahlu->iTotalRecords = $total_records->row()->rows;
				$ahlu->iTotalDisplayRecords = $ahlu->iTotalRecords;
				if($rs->num_rows() > 0){
					$rs = $rs->result_array();


					foreach($rs as $i=> $obj){
						//
						
						$obj["email"] = html_entity_decode($obj["email"]);
						$obj["username"] = html_entity_decode($obj["username"]);

						$temps = explode("\$ahlu\$",$obj["meta"]);
						if(count($temps)>0){
							foreach($temps as  $v){
								$k=explode("=",ltrim($v,"_"));
								if(isset($k[1]))
									$obj[$k[1]] = decode_key_value(!empty($k[2]) ? (String::is_serial($k[2]) ? unserialize($k[2]) : $k[2] ) :null);
							}
						}
						unset($obj["meta"]);
						
						//update
						$rs[$i] = $obj;
					}
					
					//$this->tables_info[$tb] = array();
					$keys = array_keys($this->columns);
					foreach($rs as $j=> $arr){
						$obj = new stdClass();
						$obj->DT_RowId = $j;
						foreach($this->columns as $i=> $c){
							if($c=="action_column"){
								$obj->{$c} = '<a href="'.$url.'/edit/'.$arr["id_user"].'" data-item=\''.json_encode(array("name"=>$arr["username"],"lang"=>$arr["alias"],"url"=>$arr["url"],"id_slug"=>$arr["id_slug"],"description"=>$arr["intro"],"id_user"=>$arr["id_user"],"feature_image"=>in_array("feature_image",$keys)?(isset($arr["feature_image"])?$arr["feature_image"]:""):"")).'\' class="btn btn-info editor_edit">Edit</a> <a href="'.$url.'/delete/'.$arr["id_user"].'"  data-item=\''.json_encode(array("id_user"=>$arr["id_user"],"id_slug"=>$arr["id_slug"])).'\' class="btn btn-danger editor_remove" data-action="delete">Delete</a>  <a href="'.$url.'/item/'.$arr["id_user"].'"  data-item=\''.json_encode(array("id_user"=>$arr["id_user"],"id_slug"=>$arr["id_slug"])).'\' class="editor_detail btn btn-dark-green">Detail</a>';
							}else if($c=="check_item"){
								$obj->{$c} = '<input type="checkbox" value="'.$arr["id_user"].'" class="check_item" />';
							}else if($c=="username"){
								$obj->{$c} = '<a href="?edit='.$arr["id_user"].'">'.$arr["username"].'</a>';
								$obj->{$c} .= (isset($this->ahlu->shortcut) && $this->ahlu->shortcut=="username") ?'
									<div class="row-actions" style="margin-top: 10px;display:none;"><span class="edit"><a href="'.$url.'/edit/'.$arr["id_user"].'" title="Edit this item">Edit</a> | </span><span class=""><a href="#" class="editinline" title="Edit this item inline">Quick&nbsp;Edit</a> | </span><span class="trash"><a class="submitdelete" title="Move this item to the Trash" href="'.$url.'/trash/'.$arr["id_user"].'">Trash</a> | </span><span class="view"><a href="'.DOMAIN."/".$arr["url"].'.'.SEO.'" target="_blank" title="View “Admission”" rel="permalink">View</a></span></div>
								' :"";
							}else if($c=="avatar"){
								$o = json_decode($arr["avatar"]);
								//die();
								$img = "/ahlustream/".(!isset($o->path) || empty($o->path) ? "uncategory.png": $o->path);
								$obj->{$c} = '<img title="'.$arr["username"].'" alt="'.$arr["username"].'" class="open_modal"  call-func="just_open_img" src="'.$img.'" height="75px" />';
							}else{
								if(isset($arr[$c])){
									$obj->{$c} = empty($arr[$c]) && $arr[$c]!=0 ? "n/a" :strip_tags($arr[$c]);
								}
							}
						}
						$ahlu->aaData[] = $obj;
						
					}
					
				}
			}catch(Exception $e){
				$ahlu->error = $e->getMessage();
				$ahlu->id =1;
			}
			
			return json_encode($ahlu);
        }
		
	/////        
		private function getColumnbelong($tb,$col){
			foreach($tb as $t =>$cols){
				if(in_array($col,$cols)){
					return  "{$t}.{$col}";
				}
			}
		}
		
		
		/*
		* Initialize data
		*/
		private function initialize(){ 
			$this->iColumns = (int)$this->ahlu->iColumns;
			$this->requestPage = (int)$this->ahlu->sEcho;
			$this->iDisplayStart = (int)$this->ahlu->iDisplayStart;
			$this->iDisplayLength = (int)$this->ahlu->iDisplayLength;
			$this->limit = 'limit '.($this->requestPage==1?0:($this->requestPage-1)*$this->iDisplayStart).",{$this->iDisplayLength}";
			
			//column to sort
			$this->coltoSearch = (int)$this->ahlu->iSortCol_0 +1;
			//sort by
			$this->sSortDir_0 = $this->ahlu->sSortDir_0;
			
			//get all table requested
			if(isset($this->ahlu->t)){
				
				$tables = explode("-",$this->ahlu->t);

				if(is_array($tables) && count($tables)>0){
					//get deencrypt table
					foreach($tables as $i=> $v){
						if(isset($this->tables[$v])){
							$tb = $this->tables[$v];
							$tables[$i] = $tb;
							$query = "SHOW COLUMNS FROM {$tb}";
							$rs = $this->db->query($query);
							if($rs->num_rows() > 0){
								$rs = $rs->result_array();
								$this->tables_info[$tb] = array();
								foreach($rs as $arr){
									$this->tables_info[$tb][]= $arr["Field"];
								}
							}
						}
					}
					
				}
		   }
			//get all column requested
			if($this->iColumns>0){
				for($i=0;$i<$this->iColumns;$i++){
				
					$a= "mDataProp_".$i;
					if(!empty($this->ahlu->{$a})){
						$this->columns[$i] = $this->ahlu->{$a};
						//$this->getColumnbelong($this->tables_info,$columns[$i]);
						if($i==$this->coltoSearch)
						{
							$this->coltoSearch = $this->ahlu->{$a};
						}
					}
				}
			}
			//search
			if(!empty($this->ahlu->sSearch)){
				$this->sSearch = array();
				for($i=0;$i<$this->iColumns;$i++){
					$a= "mDataProp_".$i;
					$s= "bSearchable_".$i;
					if(!empty($this->ahlu->{$a}) && $this->ahlu->{$s} == "true" && !in_array($this->ahlu->{$a}, array("category","action_column","check_item"))){
						$this->sSearch[] = $this->ahlu->{$a}." like '%".$this->ahlu->sSearch."%'";
					}
				}
				$this->sSearch = implode(" or ", $this->sSearch);
			}
			//repare data to response to client
			$ahlu = new stdClass();
			$ahlu->id =-1;
			$ahlu->error ="";
			$ahlu->fieldErrors = array();
			$ahlu->data = array();
			$ahlu->aaData = array();
			$ahlu->sEcho = $this->requestPage;
			$ahlu->iDisplayStart = $this->iDisplayStart;
			$ahlu->iDisplayLength = $this->iDisplayLength;
			$ahlu->iTime = 0;
			
			
			
			
			//checking
			if(!$this->hasTables()){
				echo "Can not find tables in database.";
				return;
			}
			

			return $ahlu;
		}
    }
?>