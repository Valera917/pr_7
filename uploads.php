<?php
if(isset($_FILES['photo'])){
		$file = $_FILES['photo'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		
		$file_ext = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext));
		
	
			if($file_size <= 2097152){
				$file_name_new = $file_name;
				$file_destination = 'public/images/' . $file_name_new;
				
				if(move_uploaded_file($file_tmp, $file_destination));
			}
		
}

?>