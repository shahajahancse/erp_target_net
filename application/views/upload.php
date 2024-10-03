<?php


$target_path="D:\xampplite\htdocs\payroll\uploads\photo";
@move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)

?>