<?php


$target_path="uploads/photo/";
@move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)

?>