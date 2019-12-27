<?php
class upload{
	function __construct(){

	}
	function up($formname ){
            if(isset($_FILES[$formname]) && $_FILES[ $formname ]['error'] <>4 ){
			$file = $_FILES[ $formname ];
			if($file ['error'] >0 ){
				echo "failed upload" ;
			}

		    $allowedExts = array ("jpg","jepg","png");
		    $temp = explode(".",$_File["name"]);
            $extension = end($temp);
            if (in_array($extension,$allowedExts)) {
            echo "success";
            }
            else{
            echo "非法的文件格式";
            }
			if($file['size'] >1024*1024*600 ){
				echo "文件太大";
			}
			$filename = uniqid().'.jpg';
			move_uploaded_file($file['tmp_name'], "uploads/{$filename}");
			return $filename;
		}else{
			return '' ;
		}
	}
}
