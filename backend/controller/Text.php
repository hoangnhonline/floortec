<?php
$url = "../index.php?mod=text&act=list";
require_once "../model/Backend.php";
$model = new Backend;

$id = (int) $_POST['id'];
$text_vi = $_POST['text_vi'];
$text_en = $_POST['text_en'];
if($id > 0) {
	$model->updateText($id,$text_vi,$text_en);
	header('location:'.$url);
}else{
	$model->insertText($text_vi,$text_en);
	header('location:'.$url);
}

?>
