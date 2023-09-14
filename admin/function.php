<?php
function get_value($table,$srcfild,$srcval,$rtrnfild,$morecond)
{
	$sql=mysql_query("SELECT $rtrnfild FROM $table WHERE $srcfild='$srcval' $morecond");
	while($R=mysql_fetch_array($sql))
	{
		$rtrnval=$R[$rtrnfild];
	}
		return $rtrnval;
}

function photo_upload($file_nm,$file_size,$target_path,$width,$height)
{
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES[$file_nm]["name"]);
	$extension = end($temp);
	if ((($_FILES[$file_nm]["type"] == "image/gif")
	|| ($_FILES[$file_nm]["type"] == "image/jpeg")
	|| ($_FILES[$file_nm]["type"] == "image/jpg")
	|| ($_FILES[$file_nm]["type"] == "image/pjpeg")
	|| ($_FILES[$file_nm]["type"] == "image/x-png")
	|| ($_FILES[$file_nm]["type"] == "image/png"))
	&& ($_FILES[$file_nm]["size"] < $file_size)
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES[$file_nm]["error"] > 0)
		{
			$response="Return Code: " . $_FILES[$file_nm]["error"] . "<br>";
		}
		else
		{
			$response=move_uploaded_file($_FILES[$file_nm]["tmp_name"],$target_path);
			$image = new SimpleImage();
			$image->load($target_path);
			$image->resize($width,$height);
			$image->save($target_path);
			$er2="Picture Upload Successfully.";
		}
	}
	else
	{
		$er2="Invalid Profile Picture";
	}
	return $response;
}
?>