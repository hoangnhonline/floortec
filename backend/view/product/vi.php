<div class="col-md-12" >
<!-- Custom Tabs -->
    <div style="clear:both;margin-bottom:30px"></div>
    <div class="box-header">
        
    </div><!-- /.box-header -->
    <div class="nav-tabs-custom" style="margin-top:30px;padding-left:10px" >
        <div class="button">                    
            <div class="row">
                    
                <div class="col-md-12" >
          
                    <div class="form-group">
                        <label>Loại sản phẩm <span class="required"> ( * ) </span></label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">--select--</option>
                            <?php if(!empty($arrCate)){ 
                                foreach ($arrCate as $cate) {                                          
                                ?>
                            <option 
                            <?php  if($data['category_id']==$cate['id']) echo "selected='selected'" ; ?>
                            value="<?php echo $cate['id']?>"><?php echo $cate['name_vi']; ?></option>
                            <?php }} ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>Sản phẩm <span class="required"> ( * ) </span></label>
                        <input type="text" name="name_vi" id="name_vi" class="form-control required" value="<?php if(!empty($data)) echo $data['name_vi']; ?>" />
                    </div>                                                                                   
                    
                </div>
            </div>
        </div>
    </div>                            
</div>
<div class="col-md-12">
    <div class="form-group col-md-12" style="padding-top:5px">
                    <label>Hình ảnh</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="button" id="btnUpload" style="margin-bottom:10px">Upload</button>                       
                    <div id="load_hinh">
                        
                    </div>
                    <?php if(isset($detail['images']) && $detail['images']){ ?>
                    <div id="images_post">
                        <?php foreach ($detail['images'] as $v) { 
                            $checked = $v['url'] == $data['image_url'] ? "checked='checked'" :  "";
                            ?>
                        <div class="col-md-2 image_upload" id="img_<?php echo $v['image_id']; ?>">
                            <img src="../<?php echo $v['url']; ?>" width="150"><br />
                            <p style="width:70%;float:left;margin-top:10px">
                                <input type="radio" <?php echo $checked; ?> name="image_url" value="<?php echo $v['url']; ?>" id="daidien_<?php echo $v['image_id']; ?>" /> Ảnh đại diện
                            </p>
                            <p style="width:30%;float:left;text-align:right;margin-top:10px">
                                <span class="del_img" style="cursor:pointer" data-value="<?php echo $v['image_id']; ?>">Xóa</span>
                            </p>
                        </div>
                        <?php } ?>
                    </div>                
                    <?php } ?>                    
                </div> 
    <div class="form-group">
        <label>Giới thiệu</span></label>
        <textarea name="description_vi" id="description_vi" class="form-control" rows="10"><?php if(!empty($data)) echo $data['description_vi']; ?></textarea>
    </div>
</div>