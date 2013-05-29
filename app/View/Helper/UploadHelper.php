<?php


class UploadHelper extends AppHelper {
	
		private $formatsVideoAccepted = array (".mp4", ".mov");
		
		public function getFormatsVideoAccepted(){
			return $this->formatsVideoAccepted;
		}

}