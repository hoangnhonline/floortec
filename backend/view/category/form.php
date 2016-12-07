<?php 
require_once "model/Backend.php";
$model = new Backend;

$link = "index.php?mod=category&act=list";
$data = array();
if(isset($_GET['id'])){

    $id = (int) $_GET['id'];

    require_once "model/Backend.php";

    $model = new Backend;

    $data = $model->getDetailcategory($id);           
}
?>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=category&act=list'">Danh sách</button>
        <form method="post"  action="controller/Category.php" enctype="multipart/form-data">

        <div class="col-md-12">

            <!-- Custom Tabs -->

            <div style="clear:both;margin-bottom:10px"></div>

            <div class="box-header">

                <h3 class="box-title"><?php echo (isset($id) && $id> 0) ? "Cập nhật" : "Tạo mới" ?> loại sản phẩm <?php echo (isset($id) && $id> 0) ? " : ".$data['name_vi'] : ""; ?></h3>

                <?php if(isset($id) && $id> 0){ ?>
                <input type='hidden' name='display_order' value="<?php echo $data['display_order']; ?>">
                <input type="hidden" value="<?php echo $id; ?>" name="category_id" />

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
                <button class="btn btn-primary" type="button" onclick="location.href='index.php?mod=category&act=list'">Cancel</button>
            </div>

        </div>
        </form>
    </div>
</div>
<link href="static/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="static/ckfinder/ckfinder.js"></script>
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
configEditor['height'] = '150px';
var editor = CKEDITOR.replace('description_en',configEditor);
var editor1 = CKEDITOR.replace('description_vi',configEditor);
var editor2 = CKEDITOR.replace('dacdiem_en',configEditor);
var editor3 = CKEDITOR.replace('dacdiem_vi',configEditor);
var editor4 = CKEDITOR.replace('ungdung_en',configEditor);
var editor5 = CKEDITOR.replace('ungdung_vi',configEditor);
var editor6 = CKEDITOR.replace('phanloai_en',configEditor);
var editor7 = CKEDITOR.replace('phanloai_vi',configEditor);
$(function(){
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
});      
</script>
