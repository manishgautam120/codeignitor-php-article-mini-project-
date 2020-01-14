<?php include('public_header.php');?>
    <div class="container">
            <h3>All Articals</h3>
           
            <table class="table">
                <tread>
                    <tr>
                        <td>Sr. No.</td>
                        <td>Article Title</td>
                        <td>Published On</td>
                    </tr>
                </tread>
                <tbody>
                    <tr>
                       
                        <?php if(count($articles)):?>
                            <?php $count = $this->uri->segment(3, 0);?>
                            <?php foreach($articles as $article):?>
                                        <td><?=++$count?></td>
                                        <td><?= anchor("user/article/{$article->id}",$article->title);?></td>
                                        <td><?= date('d M y H:i:s',strtotime($article->created_at));?></td>
                                       
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


    <?php include('public_footer.php');?>