<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo !empty($theme->isMobile)? $theme->isMobile : ""; ?>>
<head>
<?php echo !empty($theme->seo)? $theme->seo : ""; ?>

<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<?php

       //include enternal css
     if(!empty($theme->includes_css))
       echo   $theme->includes_css;
	 if(!empty($theme->includes_js))
		echo   $theme->includes_js;
?>
</head>
<body <?php echo isset($theme->cls)?'class="'.(is_array($theme->cls)?implode(" ",$theme->cls):$theme->cls).'"':""?>>
	Generated the default on THEME <?php echo THEME; ?>
    <?php __($theme->header);  ?>
    
    <?php __($theme->content);  ?>

    <?php __($theme->footer);  ?>

</body>
</html>