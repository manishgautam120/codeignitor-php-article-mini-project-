
<?php include_once('admin_header.php');?>

<div class="container">
 
<?php echo form_open('admin/store_article',['class'=>'form-horizontal']);?>
<?php echo form_hidden('user_id',$this->session->userdata('user_id'))?>
<?php 
 $timezone = new DateTimeZone("Asia/Kolkata" );
 $date = new DateTime();
 $date->setTimezone($timezone );
 $dtobj = $date->format('Y-m-d H:i:s');

?>
<?= form_hidden('created_at',$dtobj ) ?>
  <fieldset>
  <legend>ADD ARTICLE</legend>
 
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label  class="col-lg-3 control-label">Artical Title*</label>
           
                <div class="col-lg-9">
                    <?php echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Article Title','value'=>set_value('title')])?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
                 <?php echo form_error('title'); ?> 
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                     <label  class="col-lg-3 control-label">Article Body*</label>
                <div class="col-lg-9">
                  <?php echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Article Body','value'=>set_value('body')])?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
        <?php echo form_error('body'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
           <div class="form-group">
            <div class="col-lg-9 col-lg-offset-3">
                   
                        <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']);?>
                        <?php echo form_submit(['name'=>'submit','value'=>'Add ','class'=>'btn btn-primary']);?>
                  
            </div>
           </div>
        </div>
    </div>
  </fieldset>
</form>
</div>

<?php include_once('admin_footer.php');?>

