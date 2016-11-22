<?php


class Img {	
	var $tamanios = array (
							"large"=>"800x600",
							"xlarge"=>"1024x768",
							"xxlarge"=>"1200x900",
							"m"=>"640x480",
							"s"=>"300x240",
							"xs"=>"150x120",
							"ico"=>"32x32"
	);

	public function redimensionar($tamanio, $ruta, $imagen){
		Load::lib('wideimage/WideImage');		
		$image = WideImage::load("$ruta/$imagen");		
		list($ancho,$largo) = explode('x',$this->tamanios[$tamanio]);				
		if($image->getWidth()<$image->getHeight()){
			return $image->resize(null, $largo)->saveToFile("$ruta/$tamanio/$imagen");
		}else{
			return $image->resize($ancho, null)->saveToFile("$ruta/$tamanio/$imagen");
		}
	}
	private function crearCarpeta($carpeta){
		if (!file_exists($carpeta)) {
			mkdir($carpeta, 0755, true);
		}
	}
	
	public function todo($tamanio, $imagen){
		$ruta = getcwd()."/img";				
		if(!is_file("$ruta/$tamanio/$imagen")){
			if(is_file("$ruta/$imagen")){
				$this->crearCarpeta("$ruta/$tamanio");
				$this->redimensionar($tamanio, $ruta, $imagen);
				header('Location: '.PUBLIC_PATH."img/$tamanio/$imagen", TRUE, 301);				
			}else{				
				header("HTTP/1.0 404 Not Found");				
			}
		}		
	}	
	
}