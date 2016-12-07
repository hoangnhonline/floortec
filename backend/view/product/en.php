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
                        <label>Name <span class="required"> ( * ) </span></label>
                        <input type="text" name="name_en" id="name_en" class="form-control required" value="<?php if(!empty($data)) echo $data['name_en']; ?>" />
                    </div>                                                                                  
                    
                </div>
            </div>
        </div>
    </div>                            
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Description</span></label>
        <textarea name="description_en" id="description_en" class="form-control" rows="10"><?php if(!empty($data)) echo $data['description_en']; ?></textarea>
    </div>
</div>