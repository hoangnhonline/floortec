<?php 
if($id > 0){
?>
<h1 style="font-size:20px;color:#23527c"><?php echo $detail['name_'.$lang]; ?></h1>
<?php if(!empty($data['images'])){  ?>
<div class="col-md-12" style="margin-bottom:20px;margin-top:20px">
 	<!--<div id="gallery-1" class="royalSlider rsDefault">  
 		<?php 
 			foreach ($data['images'] as $value) { 				
 		?>       
		<a class="rsImg bugaga" data-rsh="500" data-rsBigImg="<?php echo $value['url']; ?>" href="<?php echo $value['url']; ?>">
			<img height="72" width="96" class="rsTmb" src="<?php echo $value['url_1']; ?>" />
		</a>                  		       
		<?php } ?>  
	</div>-->
<?php 
foreach ($data['images'] as $value) { 				
?>       
<div class="col-md-6" style="min-height:250px">
<a class="fancybox" href="<?php echo $value['url']; ?>" data-fancybox-group="gallery"><img src="<?php echo $value['url']; ?>" alt="" class="img-responsive" width="300" height="250" /></a>                  		       
</div>
<?php } ?> 
	
</div>
<?php } ?>
<div class="col-md-12" style="padding:0px" >
	
		<?php echo $detail['description_'.$lang]; ?>
	
</div>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="js/jquery.mousewheel.pack.js?v=3.1.3"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="js/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="js/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="js/jquery.fancybox-media.js?v=1.0.6"></script>
       <link href="css/royalslider.css" rel="stylesheet">        
    <script src="js/jquery.royalslider.min.js?v=9.3.6"></script>  
     <link href="css/rs-default.css?v=1.0.4" rel="stylesheet">    
    <script>
      jQuery(document).ready(function($) {
$('.fancybox').fancybox();
      $('#gallery-1').royalSlider({    
        controlNavigation: 'thumbnails',
        loop: true,        
        navigateByClick: true,
        numImagesToPreload:2,
        arrowsNav:true,
        arrowsNavAutoHide: true,
        arrowsNavHideOnTouch: true,
        keyboardNavEnabled: true,
        fadeinLoadedSlide: true,
        globalCaption: false,
        globalCaptionInside: false,
        thumbs: {
          appendSpan: true,
          firstMargin: true,
          paddingBottom: 4
        }
      });
    });

    </script>
<?php } ?>
