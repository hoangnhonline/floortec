<?php 
echo "<h1>"."Our website will be available soon"."</h1>";die;
session_start();
require_once 'routes.php';

if(isset($_GET['lang']) && in_array($_GET['lang'],array('vi','en'))){
	$lang = $_GET['lang'];
	$_SESSION['lang'] = $lang;
}elseif(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}else{
	$lang = "vi";
}

/*
$mod = isset($_GET['mod']) ? $_GET['mod'] : "";
if($mod == "cate") {
    $cate_id = (int) $_GET['cate_id'];
    $detail = $model->getDetailCate($cate_id);
}
if($mod=="product"){    
    $id = (int) $_GET['id'];
    $data = $model->getDetailProduct($id);    
    $detail = $data['data'];
    $cate_id = $detail['category_id'];
    $detailCate = $model->getDetailCate($cate_id);
}
*/
$arrText = $model->getListText();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0044)http://www.danceequipmentintl.com/index.html -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $seo['meta_title_'.$lang]; ?></title> 
    <base href="http://floortec.vn" />     
    <meta name="description" content="<?php echo $seo['meta_description_'.$lang]; ?>">
    <meta name="keywords" content="<?php echo $seo['meta_keyword_'.$lang]; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="geo.region" content="VN" />
	<meta name="geo.placename" content="Hồ Chí Minh" />
	<meta name="geo.position" content="10.765737;106.64713" />
	<meta name="ICBM" content="10.765737, 106.64713" />
	<meta name="DC.Title" content="Công ty Floortec">
	<meta name="DC.Creator" content="hoangnhonline">
	<meta name="DC.Subject" content="Công ty Floortec">
	<meta name="DC.Description" content="Công ty TNHH XNK TM XD FLOORTEC là doanh nghiệp chuyên sản xuất, nhập khẩu, kinh doanh và thi công các sản phẩm nội thất,">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" media="screen" href="./static/styles.css">
    <link rel="stylesheet" type="text/css" media="print" href="./static/print.css">   
    <script type="text/javascript" src="./static/drop_down.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="./static/slimbox2.js"></script>
    <link rel="stylesheet" href="./static/slimbox2.css" type="text/css" media="screen">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>    
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <meta name="robots" content="all">

</head>
<body cz-shortcut-listen="true">	
    <div id="container" class="shadow container">
		
        <!-- Start the header -->
        <div id="pageHeader" class="col-sm-12" style="padding:0px">
           <div class="col-sm-3" style="text-align:center;padding:0px">
                <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>"><img src="img/logo.png" class="logo" alt="Logo Floortec" title="Logo Floortec"/></a>                
                <h3>Hotline: <?php echo $arrText[1]['text_'.$lang]; ?></h3>
           </div>           
           <div class="col-sm-9">
                <div class="row">
                <ul class="bxslider">
<?php $arr2 = $model->getListBannerByPosition(1);

	  if(!empty($arr2)){			  
        $count = 0;
		  foreach($arr2 as $img){	
$count++;
            ?>
                  <li><img src="<?php echo $img['image_url']; ?>" alt="banner Floortec <?php echo $count; ?>" title="banner Floortec <?php echo $count; ?>" /></li>
<?php } } ?>
                 
                </ul>
                </div>
           </div>
        </div>
        <div style="clear:both"></div>
        <!-- End the header -->
        <div class="col-sm-12"  style="padding:0px;margin-top:20px">
            <div class="col-sm-3"  style="padding:0px">
                 <div id="MainMenu">
                  <div class="list-group panel">
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" class="list-group-item list-group-item-success <?php if($mod=="") echo "active"; ?>"><?php echo $arrText[8]['text_'.$lang]; ?></a>                   
                    <a href="javascript:;" class="list-group-item list-group-item-success" data-parent="#MainMenu">

                        <?php echo $arrText[14]['text_'.$lang]; ?><span class="glyphicon glyphicon-menu-right" aria-hidden="true" style="float:right"></span></a>
                    <div class="expand" id="mproduct">
                      <?php $cateArr = $model->getListCategory(); 
                      if(!empty($cateArr)){
                        foreach ($cateArr as $cate) {
                      ?>
                      <a href="<?php echo $cate['alias_'.$lang]; ?>.html" class="list-group-item <?php if($cate_id == $cate['id']) echo "active"; ?>"><?php echo $cate['name_'.$lang]; ?></a>
                      <?php } } ?>                      
                    </div>
                    <a href="lien-he.html" class="list-group-item list-group-item-success <?php if($mod=="contact") echo "active"; ?>"><?php echo $arrText[10]['text_'.$lang]; ?></a> 
                  </div>
                </div>
            </div>
            <div class="col-sm-9">   
		    <div style="text-align:right">
    			<a href="http://floortec.vn?lang=vi"><img src="img/vi.png" alt="Vi language"/></a>
    			<a href="http://floortec.vn?lang=en"><img src="img/en.png" alt="En language"/></a>
		    </div>
                    <div id="breadcrumbcontainer">                        
                        <ul>
                            <li><a href=""><?php echo $arrText[8]['text_'.$lang]; ?></a>&nbsp; &gt;</li>
                            <?php if($mod=="cate"){ ?>
                            <li><a href="javascript:;"><?php echo $arrText[9]['text_'.$lang]; ?></a>&nbsp; &gt;</li>
                            <?php } ?>
                            <?php if($mod == "detail") { ?>
                            <li><a href="<?php echo $detailCate['alias_'.$lang]; ?>.html"><?php echo $detailCate['name_'.$lang]; ?></a>&nbsp; &gt;</li>
                            <?php } ?>                            
                            <li>
                                <?php 
                                if($mod=="") echo $arrText[2]['text_'.$lang];
                                if($mod == "cate" || $mod =="detail") echo $detail['name_'.$lang];
                                if($mod == "contact") echo $arrText[10]['text_'.$lang]; 
                                ?>

                            </li>
                        </ul>
                    </div>
                    <div id="content">
                        <?php
                        if( $mod == "" ){ 
                            $about  = $model->getDetailPage(1);                           
                        ?>
                        <?php echo $about['content_'.$lang]; ?>
                        <?php }else{
                            include "page/".$mod.".php";
                        } ?>
                    </div>             
            </div>
        </div>
        <!-- Start the main content -->
        
        <!-- End Main content -->

        <!-- Start the side content -->
       
        <!-- End sidebar content -->

        <br style="clear: both;">

        <div id="footer" class="col-sm-12">    
            <div class="col-sm-4" style="text-align:left">
                <h1><?php echo $arrText[2]['text_'.$lang]; ?></h1>
                 <?php echo $arrText[3]['text_'.$lang]; ?>
            </div>        
            <div class="col-sm-4" style="text-align:left">
                <h2><?php echo $arrText[4]['text_'.$lang]; ?></h2>
                <div class="social facebook">
                    <a href="#"></a>
                </div>
                <div class="social twitter">
                    <a href="#"></a>
                </div>
                <div class="social deviantart">
                    <a href="#"></a>
                </div>
                <div class="social flickr">
                    <a href="#"></a>
                </div>
                <div class="social dribbble">
                    <a href="#"></a>
                </div>
            </div>
            <div class="col-sm-4" style="text-align:left">
                <h2 class="newsmargin"><?php echo $arrText[5]['text_'.$lang]; ?></h2>
                <div class="newsletter">
                    <div class="col-sm-8" style="padding:0px">
                        <input type="text" class="nomargin" placeholder="<?php echo $arrText[6]['text_'.$lang]; ?>">
                    </div>                   
                </div>
            </div>
           
        </div>
    </div>
    <!--container -->
    <div class="webspeedling">© Copyright 2015  <a class="webspeedling" href="http://floortec.vn">floortec.vn</a> </div>
   
   
   
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.bxslider.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery('.bxslider').bxSlider();
    });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53928005-7', 'auto');
  ga('send', 'pageview');

</script>
</body>

</html>
