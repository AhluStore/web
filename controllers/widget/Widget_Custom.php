<?php
	class Widget_Custom extends Widget_Product implements IWidgetCategory{

		/////implements
			public function search($data){
				echo $data;
			}
			public function listAll($data){
			
			}
		/////
	}	
?>