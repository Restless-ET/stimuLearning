<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>Página não encontrada</title>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
  <div id="error_404">
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>" >
      <?php echo image_tag('gsbl_v7.png',array('alt'=>'gsbl', 'title'=>'gsbl')); ?>
    </a>
    <br /><br />
    <?php echo $sf_content; ?>
  </div>
  </body>
</html>
