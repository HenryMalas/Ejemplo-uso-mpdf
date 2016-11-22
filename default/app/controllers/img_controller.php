<?php


class ImgController extends AppController{
	

	public function large($imagen){
		$ima = (new Img())->todo("large",$imagen);
		View::select(null,null);
	}
	
	public function m($imagen){
		$ima = (new Img())->todo("m",$imagen);
		View::select(null,null);
	}
	
}