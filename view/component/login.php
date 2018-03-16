<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Login</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
<link href='<?php echo theme_js_user("map/css/form.css");?>' rel="stylesheet" type="text/css">
<script src="<?php echo theme_js_user("js/jquery-1.7.min.js");?>" type="text/javascript" charset="utf-8"></script> 

<script type="text/javascript">
 $(document).ready(function () {

});
</script>
</head>
<body>
    <form method="post" id="login" action="<?php echo base_url();?>panel/login">
        <h1>Log In</h1>
    <fieldset id="inputs">
        <input id="username" name="username" type="text" placeholder="Username" autofocus required>   
        <input id="password" type="password" name="password" placeholder="Password" required>
    </fieldset>
    <fieldset>
        <p class="error_msg"><?php __($msg);?></p>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in">
    </fieldset>
    </form>
</body>

</html>