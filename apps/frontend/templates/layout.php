<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

    <script type="text/javascript">

    var currentTime = new Date ('<?php echo date("d M Y H:i:s")?>');
    setInterval('updateClock()', 1000);

    function updateClock()
    {
      currentTime.setTime(currentTime.valueOf() + 1000); // advance the time

      var currentHours = currentTime.getHours ( );
      var currentMinutes = currentTime.getMinutes ( );
      var currentSeconds = currentTime.getSeconds ( );

      // pad the minutes and seconds with leading zeros, if required
      currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
      currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

      var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds

      document.getElementById('clock').innerHTML = currentTimeString; // update display
    }

  </script>

  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1>
          <a class="sitelogo" href="<?php echo url_for('@homepage') ?>">
            <?php echo image_tag('gsbl_v7.png') ?>
          </a>
        </h1>
    <div id="system_info">
      <?php if($sf_user->isAuthenticated()): ?>
      Logado como: <?php echo $sf_user->getAttribute('Username') ?>
      <br />
      <?php endif; ?>
      <?php echo date("Y-m-d",time()) ?>
      <br />
      <span id="clock"><?php echo date("H:i:s")?></span>
    </div>
      </div>
     <?php //include_partial('global/menu'); ?>
      <div id="content">
        <?php //include_partial('global/title'); ?>

        <?php echo $sf_content ?>
      </div>

      <div id="footer">
        powered by <a href="http://gsbl.det.ua.pt">
        <?php echo image_tag('gsbl_logo.png', array('alt'=>'GSBL', 'height' => '20px')) ?></a>
      </div>
    </div>
  </body>
</html>