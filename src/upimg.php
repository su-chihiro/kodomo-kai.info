<?php

$img_name = $_FILES['upimg']['name'];
move_uploaded_file($_FILES['upimg']['tmp_name'], './img/' . $img_name);

var_dump($_FILES);
// var_dump($_FILES['upimg']);

$width = 0;
$height = 1;
// $size = getimagesize($_FILES['upimg']['tmp_name']);
// var_dump($size);
// var_dump($size[$width]);
// var_dump($size[$height]);



// 画像を保存

// echo '<img src="img.php?img_name=' . $img_name . '">';


?>
