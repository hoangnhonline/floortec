<?php
$url = "../index.php?mod=product&act=list";
require_once "../model/Backend.php";
$model = new Backend;

$id = (int) $_POST['product_id'];

$arrParams['category_id'] = (int) $_POST['category_id'];

$arrParams['name_vi'] = $model->processData($_POST['name_vi']);
$arrParams['name_en'] = $model->processData($_POST['name_en']);

$arrParams['alias_vi'] = $model->changeTitle($arrParams['name_vi']);
$arrParams['alias_en'] = $model->changeTitle($arrParams['name_en']);

$arrParams['description_vi'] = mysql_real_escape_string($_POST['description_vi']);
$arrParams['description_en'] = mysql_real_escape_string($_POST['description_en']);


$image_url_upload = $_FILES['image_url_upload'];
if(($image_url_upload['name']!='')){
	$arrRe = $model->uploadImages($image_url_upload);	
	$arrParams['image_url'] = $arrRe['filename'];
}else{
	$arrParams['image_url'] = str_replace('../', '', $_POST['image_url']);
}

$str_image = $_POST['str_image'];


$table = "product";
if($id > 0) {	
	$arrParams['id'] = $id;
	$model->update($table,$arrParams);
	$arrTmp = array();
    if($str_image){
        $arrTmp = explode(';', $str_image);
    }            
    if(!empty($arrTmp)){
        foreach ($arrTmp as $url1) {
            if($url1){                       
                $url_1 =  str_replace('.', '_2.', $url1);                        
                mysql_query("INSERT INTO images VALUES(null,'$url1','$url_1',$id,1,1)") or die(mysql_error().$sql);                
            }
        }
    }
	header('location:'.$url);
}else{
	$id = $model->insert($table,$arrParams);
	$arrTmp = array();
	    if($str_image){
		$arrTmp = explode(';', $str_image);
	    }
    
    if(!empty($arrTmp)){
        foreach ($arrTmp as $url1) {
            if($url1){                       
                $url_1 =  str_replace('.', '_2.', $url1); 
		$sql = "INSERT INTO images VALUES(null,'$url1','$url_1',$id,1,1)";                       
                mysql_query($sql) or die(mysql_error().$sql);
            }
        }
    }
	header('location:'.$url);
}
?>
