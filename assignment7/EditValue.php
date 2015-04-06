<html>
<head>
<title>aaa</title>
	<script type="text/javascript">
		function returnToParent()
		{
			var sharedObject=window.dialogArguments;
			var Current_Table=document.getElementById("Table_Constrain");
			var Current_Figure=document.getElementById("InputData").value;
			var Relateion=Current_Table.value;
			//document.getElementById("showtxt").innerHTML=sharedObject.Input;
			var location=sharedObject.Input.indexOf('[');
			if(location>0)
				var front_txt=sharedObject.Input.substr(0,location);
			else 
				var front_txt=sharedObject.Input;
				
			if (Relateion!="null")
				var str=front_txt+"["+Relateion+" "+Current_Figure+"]";
			else
				var str=front_txt;
			//var str=sharedObject.Input+"["+Relateion+" "+Current_Figure+"]";
			window.returnValue=str;
			//document.getElementById("showtxt").innerHTML=str;
			window.close();	
			//alert('yes');
			
		}
	</script>
	


</head>
<body>
<p id="showtxt"></p>
<select size=7 id="Table_Constrain">
<option>not like</option>	
<option>like</option>	
<option>!=</option>	
<option>=</option>	
<option>></option>	
<option><</option>
<option>null</option>		
</select>
<input type="text" id="InputData"></input>
<input type="button" value="return" onclick="returnToParent()"></input>
</body>
</html>