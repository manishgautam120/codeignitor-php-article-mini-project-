<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article List</title>
                                                    <!-- http://localhost/CodeIgniter/assets/css/bootstrap.min.css -->
 <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" >
 
 </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Article List</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
       <?php echo form_open('user/search',['class'=>'navbar-form navbar-left' ,'role'=>'search']);?>  
      
        <div class="form-group">
          <input type="text" class="form-control" name="query" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      <?= form_close();?>
      <?= form_error('query',"<p class='navbar-text' style='color:red'>",'</p>')?>
      <ul class="nav navbar-nav navbar-right">
         
      <?= anchor('login','want to log in?',['class'=>'btn btn-sm btn-primary pull-right'])?>
      </ul>
    </div>
  </div>
</nav>