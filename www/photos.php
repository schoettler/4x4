<?php 

function downloadFile ($url, $path) {

	$newfname = $path;
	$file = fopen ($url, "rb");

 	if ($file) {
	   	$newf = fopen ($newfname, "wb");

	    if ($newf){
		    while(!feof($file)) {
		    	echo $newf;
		      	fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
		    }
		}
 	}

    if ($file) 
    	fclose($file);
  
  	if ($newf) 
   		fclose($newf);
 
 }

	function getImages($images){
		if($images){
			for ($i=0; $i<count($images); $i++){
		 		$imageurl = $images[$i];
		 		$imagename = array_pop(explode('/', $imageurl));
				$path = realpath( dirname( __FILE__ ))."/cache/".$imagename;
				echo $path;
		 		downloadFile($imageurl, $path);
	 		}
		}
	} 
$images = $_POST['images'];
//var_dump($images);
getImages(json_decode($images));

?>