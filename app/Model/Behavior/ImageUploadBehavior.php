<?php


class ImageUploadBehavior extends ModelBehavior {


	public function isRightsOnFolderDestination(Model $Model, $path)
	{
		//$dossier = 'media/partenaires/logos/';
		
		var_dump($path);
	
		//var_dump($Model->data);
		
		return false;
		
	}

}



