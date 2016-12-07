<div class="col-md-6">
    <!-- Custom Tabs -->
    <div style="clear:both;margin-bottom:30px"></div>
    <div class="box-header">
        
    </div><!-- /.box-header -->
    <div class="nav-tabs-custom" style="margin-top:30px;padding-left:10px" >
        <div class="button">                    

            <div class="row">
                    
                <div class="col-md-12" >
                    <div class="form-group">
                        <label>Page name <span class="required"> ( * ) </span></label>
                        <input type="text" name="name_vi" id="name_vi" class="form-control required" value="<?php if(!empty($data)) echo $data['name_vi']; ?>" />
                    </div>                                                                                   
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="radio" id="choose_img_sv" name="choose_img" value="1" checked="checked"/> Chọn ảnh từ server
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="choose_img_cp" name="choose_img" value="2" /> Chọn ảnh từ máy tính
                        <div id="from_sv">
                            <input type="hidden" name="image_url" id="image_url" class="form-control" value="<?php if(!empty($data['image_url'])) echo "../".$data['image_url']; ?>" /><br />
                            <?php if(!empty($data['image_url'])){ ?>
                            <img id="img_thumnails" src="../<?php echo $data['image_url']; ?>" height="200" />
                            <?php }else{ ?>
                            <img id="img_thumnails" src="static/img/no_image.jpg" width="200" />
                            <?php } ?>
                            <button class="btn btn-default" type="button" onclick="BrowseServer('Images:/','image_url')" >Upload</button>
                        </div>
                        <div id="from_cp" style="display:none;padding:15px;margin-bottom:10px">
                            <input type="file" name="image_url_upload" />
                        </div>

                    </div>                            
                </div>                   
            </div>               
        </div>
    </div>
</div><!-- nav-tabs-custom -->
<div class="col-md-6">

    <!-- Custom Tabs -->
    <div style="clear:both;margin-bottom:30px"></div>
    <div class="box-header">
        
    </div><!-- /.box-header -->
    <div class="nav-tabs-custom" style="margin-top:30px" >

        <div class="button">
            <div class="col-md-12" >
                <h4 class="box-title">SEO information</h4>
                <div class="form-group">
                    <label>Title</label>
                    <textarea name="meta_title_vi" id="meta_title_vi" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_title_vi']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta description</label>
                    <textarea name="meta_description_vi" id="meta_description_vi" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_description_vi']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta keyword</label>
                    <textarea name="meta_keyword_vi" id="meta_keyword_vi" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_keyword_vi']; ?></textarea>
                </div>
            </div>        
        </div>  
        <div style="clear:both"></div>
    </div><!-- nav-tabs-custom -->
</div><!-- /.col -->
<div class="col-md-12">
    <div class="form-group">
        <label>Mô tả ngắn</span></label>
        <textarea name="description_vi" id="description_vi" class="form-control" rows="3"><?php if(!empty($data)) echo $data['description_vi']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Noi dung</span></label>
        <textarea name="content_vi" id="content_vi" class="form-control" rows="10"><?php if(!empty($data)) echo $data['content_vi']; ?></textarea>
    </div>
</div>