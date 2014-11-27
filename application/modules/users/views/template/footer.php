<p>&copy; YourSite 2010. Design by <a href="http://www.w3programmers.com">w3programmers</a> | <a href="http://www.w3programmers.com">Free Web Templates</a></p>
<?php
foreach ($footer_js as $file) {
            echo "\n\t\t";
            ?><script src="<?php echo js_url() . $file; ?>"></script><?php
        } echo "\n\t";
?>
