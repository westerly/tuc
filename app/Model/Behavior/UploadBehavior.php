<?php

define("MAX_IMG_SIZE", 2 * 1000000);
define("MAX_VIDEO_SIZE", 50 * 1000000);


class UploadBehavior extends ModelBehavior {
	

	
	// Vérifie que les photos ou vidéos upload en admin sont OK
	public function checkUploadPhotoVideo(Model $Model, $path){
		
		var_dump($Model->data);

		$infos = $Model->data["Photo"]["photo_fichier"];
		
		if(!isset($infos) || $infos["name"] == ""){
			$Model->validator()->getField('photo_fichier')->getRule('rulePhotoVideo')->message = 'Vous devez spécifier un fichier à uploader.';
			return false;
		}else{
			
			$extensions = array('.png', '.jpg', '.jpeg');
			$extension = strtolower(strrchr($infos["name"], '.'));
			if(in_array($extension, $extensions)) // The user wants to upload an image
			{
				$taille = filesize($infos['tmp_name']);
				// Check the size of the file
				
				if($taille>MAX_IMG_SIZE){
					
					$Model->validator()->getField('photo_fichier')->getRule('rulePhotoVideo')->message = 'La taille de l\'image ne doit pas dépasser 2MB.';
					return false;
				}
				
			}else{
				// Test if the user wants to upload a video
				$extensions = array('.mp4', '.mov');
				if(!in_array($extension, $extensions)){
					$Model->validator()->getField('photo_fichier')->getRule('rulePhotoVideo')->message = 'Vous devez uploader un fichier de type png, jpg, jpeg ou mp4.';
					return false;
				}else{
					// The users wants to upload a video
					$taille = filesize($infos['tmp_name']);
					if($taille>MAX_VIDEO_SIZE){
						$Model->validator()->getField('photo_fichier')->getRule('rulePhotoVideo')->message = 'La taille de la vidéo ne doit pas dépasser 50MB.';
						return false;
					}
				}
			}
		}
						
		return true;
		
	}

}



