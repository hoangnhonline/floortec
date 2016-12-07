<p class="title-contact"><?php echo $arrText[15]['text_'.$lang]; ?></p>
<div class="col-md-12" id="content-contact">
    <?php echo $arrText[25]['text_'.$lang]; ?>

<div class="col-md-12" style="margin-top:20px">
    <p class="title-contact"><?php echo $arrText[16]['text_'.$lang]; ?></p>                                
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4043957345207!2d106.70271895079705!3d10.780307262031176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f48da38e485%3A0xb27ed55b8e5fe8c3!2zMTVCLzI0IEzDqiBUaMOhbmggVMO0biwgQuG6v24gTmdow6ksIFF14bqtbiAxLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1461049658088" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div style="margin-top:20px;margin-bottom:20px;clear:both"></div>
<div style="margin-top:20px" class="col-md-12">    
<form id="contactForm" name="contactForm" action="ajax/contact.php" method="post">
            <h4 style="display:block;border-radius:5px;float:left;width:100%;color:#0DB2EA;text-transform:uppercase"><?php echo $arrText[17]['text_'.$lang]; ?></h4>           
              <div class="form-group">
                <label for="full_name"><?php echo $arrText[18]['text_'.$lang]; ?> <span class="error"> *</span></label>
                <input type="text" class="form-control required" id="full_name" name="full_name" aria-required="true" required="required">
              </div>
              <div class="form-group">
                <label for="email"><?php echo $arrText[19]['text_'.$lang]; ?> <span class="error"> *</span></label>
                <input type="email" class="form-control required" id="email" name="email" aria-required="true" required="required">
              </div>
               <div class="form-group">
                <label for="phone"><?php echo $arrText[22]['text_'.$lang]; ?> <span class="error"> *</span></label>
                <input type="text" class="form-control required" id="phone" name="phone" aria-required="true" required="required">
              </div>
              
               <div class="form-group">
                <label for="title"><?php echo $arrText[20]['text_'.$lang]; ?><span class="error"> *</span></label>
                <input type="text" class="form-control required" id="title" name="title" aria-required="true" required="required">
              </div>              
              <div class="form-group">
                <label for="content"><?php echo $arrText[21]['text_'.$lang]; ?><span class="error"> *</span></label>
                <textarea class="form-control required" name="content" cols="60" rows="5" aria-required="true"></textarea>                
              </div>
               <button type="submit" class="btn btn-primary" id="btnFinish"><?php echo $arrText[23]['text_'.$lang]; ?></button>
                 <button type="reset" id="btnReset" class="btn btn-danger"><?php echo $arrText[24]['text_'.$lang]; ?></button>
                 <div class="row" style="margin-bottom:20px"></div>
          </form>
    
    </form>
</div>
</div>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/ajaxForm.js"></script>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#contactForm').validate();
    $('#contactForm').ajaxForm({
            beforeSend: function() {                
            },
            uploadProgress: function(event, position, total, percentComplete) {              
            },
            complete: function(data) {  
              console.log(data);
              if($.trim(data.responseText)=='success'){           
                swal({   
                  title: "OK",   
                  text: "<?php echo $arrText[26]['text_'.$lang]; ?>",   
                  type: "success",                
                  confirmButtonText: "OK",  
                   closeOnConfirm: false }, 
                   function(){   
                    window.location.reload();
                  });
                
              }else{    
                  swal('Error',"<?php echo $arrText[27]['text_'.$lang]; ?>!",'error');
                  $('#btnReset').click();
              }
            }
        });
    });
</script>
<style type="text/css">
.error{
  color: red;
}
</style>   
