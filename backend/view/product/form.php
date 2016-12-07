<?php 
require_once "model/Backend.php";
$model = new Backend;

$link = "index.php?mod=product&act=list";
$data = array();
if(isset($_GET['id'])){

    $id = (int) $_GET['id'];

    require_once "model/Backend.php";

    $model = new Backend;

     $detail = $model->getDetailProduct($id); 
    $data = $detail['data'];                 
}
$arrCate = $model->getListCategory();
?>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=product&act=list'">Danh sách</button>
        <form method="post"  action="controller/Product.php" enctype="multipart/form-data">

        <div class="col-md-12">

            <!-- Custom Tabs -->

            <div style="clear:both;margin-bottom:10px"></div>

            <div class="box-header">

                <h3 class="box-title"><?php echo (isset($id) && $id> 0) ? "Cập nhật" : "Tạo mới" ?> sản phẩm <?php echo (isset($id) && $id> 0) ? " : ".$data['name_vi'] : ""; ?></h3>

                <?php if(isset($id) && $id> 0){ ?>                
                <input type="hidden" value="<?php echo $id; ?>" name="product_id" />
                <?php } ?>

            </div><!-- /.box-header -->
            <div role="tabpanel">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                    <img src="img/vi.png" >
                </a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                    <img src="img/en.png"  width="20px">
                </a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <?php include "vi.php"; ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <?php include "en.php"; ?>
                </div>               
              </div>

            </div>       

        </div><!-- /.col -->       

        <div class="col-md-12 nav-tabs-custom">           

            <div class="button">
                <button class="btn btn-primary btnSave" type="submit" >Save</button>
                <button class="btn btn-primary" type="button" onclick="location.href='index.php?mod=product&act=list'">Cancel</button>
            </div>

        </div>
        </form>
    </div>
</div>
<script src="js/form.js" type="text/javascript"></script>
<div id="div_upload" style="display:none;width:500px;">
    <div id="loading" style="display:none"><img src="img/loading.gif" width="470" /></div>
    <form id="upload_images" method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="ajax.php">
        <div style="margin: auto;">               
            <!---<img src="img/add.jpg" id="add_images" width="32" align="right" />           -->
            <div class="clear"></div>  
            <div id="wrapper_input_files" style="height:400px;overflow-y:scroll">
                <input type="file" name="images[]" /><br />                
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />                
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />
                <input type="file" name="images[]" /><br />              
            </div>    
            <?php if($detail){ ?>        
                <input type="hidden" name="is_update" value="1" />
            <?php } ?>            
            <button style="margin-top: 10px;" class="btn btn-primary" type="submit" id="btn_upload_images">Upload</button>            
        </div>
        
    </form>
</div>
<div style="display: none" id="box_uploadimages">
    <div class="upload_wrapper block_auto">
        <div class="note" style="text-align:center;">Nhấn <strong>Ctrl</strong> để chọn nhiều hình.</div>
        <form id="upload_files_new" method="post" enctype="multipart/form-data" enctype="multipart/form-data" action="ajax/upload.php"> 
            <fieldset style="width: 100%; margin-bottom: 10px; height: 47px; padding: 5px;">
                <legend><b>&nbsp;&nbsp;Chọn hình từ máy tính&nbsp;&nbsp;</b></legend>
                <input style="border-radius:2px;" type="file" id="myfile" name="myfile[]" multiple />
                <div class="clear"></div>
                <div class="progress_upload" style="text-align: center;border: 1px solid;border-radius: 3px;position: relative;display: none;">
                    <div class="bar_upload" style="background-color: grey;border-radius: 1px;height: 13px;width: 0%;"></div >
                    <div class="percent_upload" style="color: #FFFFFF;left: 140px;position: absolute;top: 1px;">0%</div >
                </div>
            </fieldset>
        </form>
    </div>
</div>
<link href="static/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="static/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="static/js/ajaxupload.js"></script>
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript">

function split(val) {
    return val.split(/;\s*/);
}

function extractLast(term) {
    return split(term).pop();
}
function BrowseServer( startupPath, functionData ){    
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
    finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
    finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
    finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
    //finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn    
    finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
    document.getElementById( data["selectActionData"] ).value = fileUrl;
    $('#img_thumnails').attr('src', fileUrl).show();
}

</script>
<script type="text/javascript">
configEditor['height'] = '250px';
var editor = CKEDITOR.replace('description_vi',configEditor);
var editor1 = CKEDITOR.replace('description_en',configEditor);
$(function(){
    $('#upload_images').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $('#loading').show();  
            $('#upload_images').hide();          
        },
        complete: function(res) { 
            var data  = JSON.parse(res.responseText);                             
            //window.location.reload();                                   
            $( "#div_upload" ).dialog('close');  
            $('#btnSaveImage').show();  
            $('#load_hinh').html(data.html);
            $('#load_hinh').append(data.str_image);
            $('#loading').hide();  
            $('#upload_images').show();          
        }
    });
    $("#btnUpload").click(function(){
        $("#div_upload" ).dialog({
            modal: true,
            title: 'Upload images',
            width: 500,
            draggable: true,
            resizable: false,
            position: "center middle"
        });
    });
    $("#add_images").click(function(){
        $( "#wrapper_input_files" ).append("<input type='file' name='images[]' /><br />");
    });
    $("#btnXoa").click(function(){
        if(confirm('Bạn có chắc chắn xóa ảnh bìa này ?')){
            $("#url_image_old, #url_image" ).val('');
            $('#imgHinh').attr('src','');
        }
    });

    $('#name_vi').blur(function(){
        if($('#meta_title_vi').val()==''){
            $('#meta_title_vi').val($(this).val());
        }
        if($('#meta_keyword_vi').val()==''){
            $('#meta_keyword_vi').val($(this).val());
        }
        if($('#meta_description_vi').val()==''){
            $('#meta_description_vi').val($(this).val());
        }        
    });
    $('#name_en').blur(function(){
        if($('#meta_title_en').val()==''){
            $('#meta_title_en').val($(this).val());
        }
        if($('#meta_keyword_en').val()==''){
            $('#meta_keyword_en').val($(this).val());
        }
        if($('#meta_description_en').val()==''){
            $('#meta_description_en').val($(this).val());
        }        
    });
    $('#choose_img_sv').click(function(){
        $('#from_sv').show();
        $('#from_cp').hide();
    });
    $('#choose_img_cp').click(function(){
        $('#from_cp').show();
        $('#from_sv').hide();
    }); 
    $('span.del_img').click(function(){
        var img_id = $(this).attr('data-value');
        if($("#daidien_" + img_id).is(":checked")){
            alert("Chọn ảnh khác làm ảnh đại diện trước khi xóa ảnh này.");
            return false;
        }else{
            if(confirm("Chắc chắn xóa ảnh này?")){ 
                $.ajax({
                    url: "controller/Delete.php",
                    type: "POST",
                    async: true,
                    data: {
                        'id' : img_id,
                        'mod' : 'images'
                    },
                    success: function(data){                    
                        $('#img_' + img_id).remove();  
                    }
                });
                    

            }else{
                return false;
            }
        }
   });  
});      
</script>
