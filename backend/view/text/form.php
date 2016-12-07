<?php
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    require_once "model/Backend.php";
    $model = new Backend;
    $data = $model->getDetailText($id);
}
?>
<div class="row">
    <div class="col-md-8">

        <!-- Custom Tabs -->
        <button class="btn btn-primary btn-sm" onclick="location.href='index.php?mod=text&act=list'">Danh sách</button>
        <div style="clear:both;margin-bottom:10px"></div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo (isset($id)) ? "Cập nhật" : "Tạo mới" ?> text</h3>

            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="controller/Text.php">
                <?php if(isset($id) && $id> 0){ ?>
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                <?php } ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="text_vi">Nội dung <img src="img/vi.png" ></label>
			<textarea name="text_vi" id="text_vi" class="form-control" rows="10"><?php if(!empty($data)) echo $data['text_vi']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text_en">Nội dung <img src="img/en.png" width="20px" /></label>
			<textarea name="text_en" id="text_en" class="form-control" rows="10"><?php if(!empty($data)) echo $data['text_en']; ?></textarea>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                     <button class="btn btn-primary btnSave" type="submit">Save</button>
                     <button class="btn btn-primary" type="reset">Cancel</button>
                </div>
            </form>
        </div>

    </div><!-- /.col -->
</div>
<script type="text/javascript" src="static/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="static/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
configEditor['height'] = '200px';
var editor = CKEDITOR.replace('text_vi',configEditor);
var editor1 = CKEDITOR.replace('text_en',configEditor);
</script>
