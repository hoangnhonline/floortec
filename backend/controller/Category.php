<?php
ini_set('display_errors',1);

$url = "../index.php?mod=category&act=list";
require_once "../model/Backend.php";
$model = new Backend;

$id = (int) $_POST['category_id'];
$arrParams['name_vi'] = $model->processData($_POST['name_vi']);
$arrParams['name_en'] = $model->processData($_POST['name_en']);

$arrParams['alias_vi'] = $alias_vi = $model->changeTitle($arrParams['name_vi']);
$arrParams['alias_en'] = $model->changeTitle($arrParams['name_en']);

if($id>0){
	$arrParams['display_order'] = $_POST['display_order'];
}else{
	$arrParams['display_order'] = $model->getOrderMax("category") + 1;
}

$arrParams['description_vi'] = mysql_escape_string($_POST['description_vi']);
$arrParams['description_en'] = mysql_escape_string($_POST['description_en']);

$arrParams['ungdung_vi'] = mysql_escape_string($_POST['ungdung_vi']);
$arrParams['ungdung_en'] = mysql_escape_string($_POST['ungdung_en']);

$arrParams['dacdiem_vi'] = mysql_escape_string($_POST['dacdiem_vi']);
$arrParams['dacdiem_en'] = mysql_escape_string($_POST['dacdiem_en']);

$arrParams['phanloai_vi'] = mysql_escape_string($_POST['phanloai_vi']);
$arrParams['phanloai_en'] = mysql_escape_string($_POST['phanloai_en']);

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

$table = "category";
if($id > 0) {	
	$arrParams['id'] = $id;
	$model->update($table,$arrParams);
	mysql_query("UPDATE url SET alias = '$alias_vi' WHERE object_id = $id") or die(mysql_error());
	header('location:'.$url);
}else{
	$id = $model->insert($table,$arrParams);
	
	header('location:'.$url);
	mysql_query("INSERT INTO url VALUES(NULL, '$alias_vi', $id, 1)") or die(mysql_error());
}

?>