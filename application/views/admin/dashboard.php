<?php include_once('admin_header.php');?>


<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-6">
    <!-- <a href="" class="btn btn-lg btn-primary pull-right">ADD ARTICLES</a></div> -->
    <?= anchor('admin/store_article','ADD ARTICAL',['class'=>'btn btn-lg btn-primary pull-right'])?>
  </div>
  <?php if( $feedback = $this->session->flashdata('feedback')): ?>
  <?php if( $feedback_color_dynamic = $this->session->flashdata('feedback_color_dynamic')): ?>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
           <div class="alert alert-dismissible <?=$feedback_color_dynamic?>">
           <strong><p><?= $feedback ?></p> </strong>
           </div>
        </div>
    </div>
   <?php endif; ?>
   <?php endif; ?>
  

</div>


<div class="container">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>SR . NO </th>
      <th>TITLE</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php if( count($articles) ):  
      
      $count = $this->uri->segment(3,0);
      
      
      ?>
        <?php foreach($articles  as $article ):  ?>
                <tr>
                    <td><?= ++$count ?></td>
                    <td><?= $article->title ?></td>
                    <td>
                        <div class="row col-lg-3"> 
                            <?=anchor("admin/edit_article/{$article->id}",'EDIT',['class'=>'btn btn-info']);?>
                        </div>
                        <div class="row col-lg-2">
                              <?=
                                  form_open('admin/delete_article'),
                                  form_hidden('article_id',$article->id),
                                  form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
                                  form_close();
                              ?>
                        </div>
                    </td>
                </tr>
        <?php endforeach ;?>
        
         <?php else : ?>
            <tr>
                <td colspan="3">
                   RECORD NOT FOUND.
                </td>
            </tr>
    
    <?php endif ;?>
  </tbody>
</table> 
<?= $this->pagination->create_links();?>
</div>






<?php include('admin_footer.php');?>


