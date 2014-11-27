 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>CodeIgniter Templating System</title>

<link rel="stylesheet" href="<?php echo base_url(); ?>/css/styles.css" type="text/css" />

</head>

<body>

<div id="container">

<div id="header">

<!--header start here -->

<?php echo $_header; ?>

<!-- header end-->

<div></div>

</div>

<div id="nav">

<!-- Top Menu Start Here -->

<?php echo $_top_menu; ?>

<!-- Top Menu End Here -->

</div>

<div id="body">

<div id="content">

<!-- Content Start Here -->

<?php echo $_content; ?>

<!-- Content End Here -->

</div>

<div class="sidebar">

<!-- sidebar star here -->

<?php echo $_sidebar; ?>

<!-- sidebar end here -->

</div>

<div></div>

</div>

<div id="footer">

<div class="footer-bottom">

<!-- Footer Start Here -->

<?php echo $_footer; ?>

<!-- Footer End Here -->

</div>

</div>

</div>

</body>

</html>
 