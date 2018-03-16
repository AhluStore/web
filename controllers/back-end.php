<?php
global $AhluMenu;
   
	Context::import("moduls.customMenu");
    Context::import("moduls.customTable");

	    //get exist menu
		$page = $AhluMenu->getObject("Page");
		$page->addsub(0,"Attached submenu",$page->link."demo");
		
		$page->onSaving(function($type,$post,$db){
			print_r($type);
			//exit();
		});

	    //register Modul
		/*
		Context::Modul(
		Menu,
		Table,
		data post,
		enable feature,
		);
		*/
	   Context::Modul(
	       new customMenu(),
		   new customTable(),
		   function($post,$action){
				//action
				//add/edit/delete
				print_r($action);
		   },
		   array()
	   );

	   
	   
	   
		///// get service
	   //Ahlu_Service::Attach("Datatable");
	   //Ahlu_Service::getinstance()->getObject("Datatable")->index();
	   
	   //enble some widget and menu in theme
	   //Context::hasMenu();
	   //Context::hasWiget();
	   
	   //add submenu
	   Context::addSubMenu("Theme",0,"Demo","/demo.php",0,function(){
		 //echo "ok";
	   });
		
	Editor::Box_template();
?>