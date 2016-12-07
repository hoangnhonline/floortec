<?php
require_once "model/Backend.php";

$model = new Backend;

$link = "index.php?mod=page&act=list";

$arrList = $model->getListPage();

?>


<div class="row">

    <div class="col-md-12">
    
    <button class="btn btn-primary btn-sm right" onclick="location.href='index.php?mod=page&act=form'">Tạo mới</button>        
    
         <div class="box-header">

                <h3 class="box-title">Danh sách trang</h3>

            </div><!-- /.box-header -->

        <div class="box">

            <div class="box_search">             

                

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped" id="tbl_list">

                    <tbody><tr>

                        <th style="width: 1%">STT </th>
                        <th width="300">Tên trang</th>                        
                        <th style="width: 40px">Thao tác</th>

                    </tr>

                    <?php

                    $i = 0; 

                    if(!empty($arrList)){                   

                    foreach($arrList as $row){

                    $i++;

                    ?>

                    <tr>

                        <td><?php echo $i; ?></td>

                        <td>
                            <a href="index.php?mod=page&act=form&id=<?php echo $row['id']; ?>">

                                <?php echo $row['name_vi']; ?> 

                            </a>
                        </td>                        
                        <td style="white-space:nowrap">                            
                        
                            <a href="index.php?mod=page&act=form&id=<?php echo $row['id']; ?>" title="Click để chỉnh sửa">

                                <i class="fa fa-fw fa-edit"></i>

                            </a>
                        
                            <a title="Click để xóa" href="javascript:;" alias="<?php echo $row['name_vi']; ?>" id="<?php echo $row['id']; ?>" mod="page" class="link_delete" >    

                                <i class="fa fa-fw fa-trash-o"></i>

                            </a> 

                        </td>

                    </tr>      

                    <?php } }else{ ?>              

                    <tr>

                        <td colspan="8" class="error_data">Không tìm thấy dữ liệu!</td>

                    </tr>

                    <?php } ?>

                </tbody></table>

            </div><!-- /.box-body -->

            <div class="box-footer clearfix">
              
            </div>

        </div><!-- /.box -->                           

    </div><!-- /.col -->

   

</div>