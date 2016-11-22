<?php


Class imgController extends AppController{
	

	public function large($imagen){
		$ima = (new img())->todo("large",$imagen);
		view::select(null,null);
	}
	
	public function m($imagen){
		$ima = (new img())->todo("m",$imagen);
		view::select(null,null);
	}
	
}