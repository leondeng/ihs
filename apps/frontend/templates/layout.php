<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php echo content_tag('title', 'International Hapkido Alliance - '.sfContext::getInstance()->getResponse()->getTitle()); ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="Wrapper">
      <div id="Header">
        <div class="content">
        </div>
      </div>
      <div class="clear"></div>
      <div id="PageContent">
        <?php echo $sf_content ?>
        <div id="Footer" class="tl">
          <div class="content">
            <ul>
              <li><a href="/about_iha.html">ABOUT INTERNATIONAL HAPKIDO ALLIANCE</a></li>
              <li><span>|</span></li>
              <li><a href="/privacy_policy.html">PRIVACY POLICY</a></li>
              <li><span>|</span></li>
              <li><a href="/term_of_use.html">TERM OF USE</a></li>
              <li><span>|</span></li>
              <li><a href="/contact_us.html">CONTACT US</a></li>
              <li><span>|</span></li>
              <li><span>&copy; 2012</span></li>
            </ul>
          </div>
        </div>
      </div>
      
    </div>
  </body>
</html>
