<?php 
if($cate_id > 0){

?>
<h1 style="font-size:20px;color:#23527c"><?php echo $detail['name_'.$lang]; ?></h1>

<div class="col-md-12" style="padding:0px" >
	
		<img src="<?php echo $detail['image_url']; ?>" class="thumbnail" width="50%" align="left" style="margin-right:10px;"/>
	
		<?php echo $detail['description_'.$lang]; ?>


	
</div>
<div class="clearfix" style="margin-bottom:20px"></div>
<div role="tabpanel" style="min-height:240px">
 
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo $arrText[11]['text_'.$lang]; ?></a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $arrText[12]['text_'.$lang]; ?></a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?php echo $arrText[14]['text_'.$lang]; ?></a></li>    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	<?php echo $detail['dacdiem_'.$lang]; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
    	<?php echo $detail['ungdung_'.$lang]; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
    	<div class="col-md-12">
    		<?php $productArr = $model->getListProduct($cate_id); 
    		if(!empty($productArr)){
    			foreach ($productArr as $product) {    			
    		?>
			<div class="view view-fifth">
		        <img src="<?php echo $product['image_url']; ?>" />
		        <div class="mask">
		            <h2><a href="chi-tiet/<?php echo $product['alias_'.$lang]; ?>.html"><?php echo $product['name_'.$lang]; ?></a></h2>
		            <p><?php echo $product['description_'.$lang]; ?></p>		            
		        </div>
		    </div>		 	
		    <?php }} ?>
		</div>
    </div>    
  </div>

</div>


<link rel="stylesheet" type="text/css" href="css/style_common.css" />
<link rel="stylesheet" type="text/css" href="css/style5.css" />
<style type="text/css">
.tab-pane {padding:10px;}
</style>
<?php } ?>
