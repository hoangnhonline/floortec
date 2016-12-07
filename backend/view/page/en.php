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
                        <label>Page name<span class="required"> ( * ) </span></label>
                        <input type="text" name="name_en" id="name_en" class="form-control required" value="<?php if(!empty($data)) echo $data['name_en']; ?>" />
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
                    <textarea name="meta_title_en" id="meta_title_en" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_title_en']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta description</label>
                    <textarea name="meta_description_en" id="meta_description_en" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_description_en']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Meta keyword</label>
                    <textarea name="meta_keyword_en" id="meta_keyword_en" class="form-control" rows="2"><?php if(!empty($data)) echo $data['meta_keyword_en']; ?></textarea>
                </div>
            </div>        
        </div>  
        <div style="clear:both"></div>
    </div><!-- nav-tabs-custom -->
</div><!-- /.col -->
<div class="col-md-12">
    <div class="form-group">
        <label>Description</span></label>
        <textarea name="description_en" id="description_en" class="form-control" rows="3"><?php if(!empty($data)) echo $data['description_en']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Content</span></label>
        <textarea name="content_en" id="content_en" class="form-control" rows="10"><?php if(!empty($data)) echo $data['content_en']; ?></textarea>
    </div>
</div>