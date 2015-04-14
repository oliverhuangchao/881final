<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Search Result</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<?php 
	include 'localsearch.php';
?>
<body>
<div id="wrapper">
	<div id="header">
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="#">881 Final Project</a></li>
			</ul>
		</div>
		<!-- end #menu -->
		<div id="search">
			<form method="get" action="remotesearch.php">
				<fieldset>
				<input type="text" name="Ori_String" id="inputword" size="15" />
				<input type="submit" id="btn1" value="do search" />
				</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
	
<!-- end #header-wrapper -->

<div id="page">
	<div id="content">
		<div class="post">
			<div class="entry">
				<p class="links"><a href="#" class="comments"><?php echo $titleArray[0];?></a> &nbsp;&nbsp;&nbsp; <a href="#" class="permalink">Full article</a></p>
				<p>This is <strong>Blogging</strong>, a free, fully standards-compliant CSS template designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>, released for free under the <a href="http://creativecommons.org/licenses/by/2.5/">Creative Commons Attribution 2.5</a> license. The photos in this design are from <a href="http://www.pdphoto.org/">PDPhoto.org</a>. You're free to use this template for anything as long as you link back to <a href="http://www.freecsstemplates.org/">my site</a>. Enjoy :)</p>
			</div>
			<div class="entry">
				<p class="links"><a href="#" class="comments"><?php echo $titleArray[1];?></a> &nbsp;&nbsp;&nbsp; <a href="#" class="permalink">Full article</a></p>
				<p>This is <strong>Blogging</strong>, a free, fully standards-compliant CSS template designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>, released for free under the <a href="http://creativecommons.org/licenses/by/2.5/">Creative Commons Attribution 2.5</a> license. The photos in this design are from <a href="http://www.pdphoto.org/">PDPhoto.org</a>. You're free to use this template for anything as long as you link back to <a href="http://www.freecsstemplates.org/">my site</a>. Enjoy :)</p>
			</div>
		￼</div>
		</div>
	
	
	
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->

<div id="footer">
	<p>Chao Huang, Di Zhang and Jinxuan Qu</p>
</div>
<!-- end #footer -->
</div>
</body>
</html>
