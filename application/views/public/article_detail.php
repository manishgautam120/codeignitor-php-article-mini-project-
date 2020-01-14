<?php include_once('public_header.php');?>

        <div class="container">
        <div class="row">
                    <div class="col-lg-3">
                      <p>Article Created:</p>
                    </div>
                    <div class="col-lg-9">     
                        <p>
                        <?= date('d M y H:i:s',strtotime($article->created_at));?>
                        </p>
                    </div>
            </div>
         

                <div class="row">
                            <div class="col-lg-3">
                                <h5>Article Title:</h5>
                            </div>
                            <div class="col-lg-9">     
                                <h4>
                                    <?= $article->title ?>
                                </h4>
                            </div>
                        
                </div>
                <hr>
        <div class="row">
                    <div class="col-lg-3 text-justify">
                        <h5>body:</h5>
                    </div>
                    <div class="col-lg-9">     
                         <h4 class="text-justify"><?= $article->body ?></h4>
                    </div>
         </div>
           
               
 </div>
<?php include_once('public_footer.php');?>