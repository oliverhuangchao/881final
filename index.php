<html>
<head>
	<title>Chao's search engine</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		/*$(document).ready(
			function(){
				$("#btn1").click(
					function(){
						var inputContent = $("#inputword").val();
						htmlobj=$.ajax({url:"searchResult.php?Ori_String="+inputContent,async:false});
						var jsonval = htmlobj.responseText;
						var jsonArrayFinal = JSON.stringify(jsonval);
						var obj = $.parseJSON(jsonArrayFinal);

						$("#result_part").html(jsonval);
					}
				);
			}
		);*/
	</script>
</head>
<body>
<?php 
	//include "info.php";
	//include "searchResult.php";
?>
<form action="remotesearch.php" method="GET">
	<input type="text" id="inputword" name="Ori_String">Please input you search word</input>
	<p></p>
	<input type="submit" id="btn1" value="do search"></input>
	<p></p>
</form>
<!-- result part -->
<div id="result_part"><h2></h2></div>

<table>
	<tr>
		<td>aa</td><td>bb</td>
	</tr>
	<tr>
		<td>cc</td><td>dd</td>
	</tr>
</table>

</body>
</html>
