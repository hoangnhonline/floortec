<?php 

$url = "../index.php?mod=page&act=list";

require_once "../model/Backend.php";

$model = new Backend;

$id = (int) $_POST['id'];
$arrParams['name_vi'] = $model->processData($_POST['name_vi']);
$arrParams['name_en'] = $model->processData($_POST['name_en']);

$arrParams['alias_vi'] = $model->changeTitle($arrParams['name_vi']);
$arrParams['alias_en'] = $model->changeTitle($arrParams['name_en']);

$arrParams['description_vi'] = ($_POST['description_vi']);
$arrParams['description_en'] = ($_POST['description_en']);

$arrParams['content_vi'] = mysql_escape_string($_POST['content_vi']);
$arrParams['content_en'] = mysql_escape_string($_POST['content_en']);

$arrParams['meta_title_vi'] = $_POST['meta_title_vi']!= "" ? $model->processData($_POST['meta_title_vi']) : $arrParams['name_vi'];
$arrParams['meta_title_en'] = $_POST['meta_title_en']!= "" ? $model->processData($_POST['meta_title_en']) : $arrParams['name_en'];

$arrParams['meta_description_vi'] = $_POST['meta_description_vi']!= "" ? $model->processData($_POST['meta_description_vi']) : $arrParams['name_vi'];
$arrParams['meta_description_en'] = $_POST['meta_description_en']!= "" ? $model->processData($_POST['meta_description_en']) : $arrParams['name_en'];

$arrParams['meta_keyword_vi'] = $_POST['meta_keyword_vi']!= "" ? $model->processData($_POST['meta_keyword_vi']) : $arrParams['name_vi'];
$arrParams['meta_keyword_en'] = $_POST['meta_keyword_en']!= "" ? $model->processData($_POST['meta_keyword_en']) : $arrParams['name_en'];

$image_url_upload = $_FILES['image_url_upload'];
if(($image_url_upload['name']!='')){
	$arrRe = $model->uploadImages($image_url_upload);	
	$arrParams['image_url'] = $arrRe['filename'];
}else{
	$arrParams['image_url'] = str_replace('../', '', $_POST['image_url']);
}

$table = "pages";
if($id > 0) {	
	$arrParams['id'] = $id;
	$model->update($table,$arrParams);
	header('location:'.$url);
}else{
	$model->insert($table,$arrParams);
	header('location:'.$url);
}




?>