<?php

class Resourse extends DataObject {

  static $db = array(
    	'Title' => 'Varchar(256)',
  		'ListingContent' => 'Varchar(256)',
  		'Content' => 'HTMLText',
  		'YouTubeID' => 'Varchar(256)',
  		'SortOrder' => 'Int'
  );

	public static $has_one = array(
		'Page' => 'Page',
		'ListingImage' => 'Image',
		'Image' => 'Image',
		'Download' => 'File'
	);
	
	static $default_sort = "SortOrder ASC";
	
	static $summary_fields = array(
			'Thumbnail' => 'Image',
			'Title' => 'Title'
	);
	

  public function getCMSFields(){
  	
    $fields = new FieldList(
		new TextField('Title', 'Title'),
		new UploadField("ListingImage","Listing Image"),
		new TextField('ListingContent', 'Listing Content'),
		new UploadField("Image","Main Image"),
		new TextField("YouTubeID","YouTube ID eg:KI0ZXXeKt0w"),
		new UploadField("Download","File eg: .PDF"),
		new HtmlEditorField("Content","Content")
	);
		
	return $fields;
  } 
  
  public function getLink(){
  	if(empty($this->Content) && empty($this->YouTubeID) && $this->Download()){
  		return $this->Download()->Link();
  	}
  	return $this->Page()->Link().'resourse/'.$this->ID;
  }
  
  function getThumbnail(){
  	if ($this->ListingImageID > 0 && $ListingImage = $this->ListingImage()){
  		return $ListingImage->CMSThumbnail();
  	}else{
  		return '(No Image)';
  	}
  }
  
}

?>