<?php
	class customMenu implements IModulMenu{
		private $menu = null;
		
		/*override*/
		public function onCreate(){
			
		}
		/*override now we create MenuModul*/
		public function createItem(){
		
			$Events = MenuModul::Create();
			$Events->name = "Events";
			$Events->link = "/admin/event";
			$Events->addsub(1,"All","/admin/event/");
			$Events->addsub(2,"Add new","/admin/events/add");
			$Events->addsub(3,"Categories","/admin/category/create/event");
			$Events->autoLoad();
			$Events->onSaving(function($type,$post,$db){
				//print_r($type);
				//exit();
			});
			
			return $Events;
		}
		/*override*/
		public function getModulName(){
		
			return __FUNCTION__;
		}
		
		/*override*/
		public function onLoad(){

		}
		/*override*/
		public function onLoaded(){

		}
	}
?>