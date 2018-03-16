<?php
	class customTable implements IModulTable{

		//override
		public function  onLoad(){

		}
		//override
		public function  onLoaded(){

		}
		
		//override
		public function onHeader($column){
			return $column;
		}
		//override
		public function onContent($content){
			return strip_tags($content);
		}
		//override
		//check column exist on table
		public function onColumnExist($column,$columns){
			return $column;
		}
	}
?>