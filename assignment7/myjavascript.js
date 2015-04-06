
function loadXMLDoc()
	{}
	
	function isEmail(str)//check the email
    {
		var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
		alert(str);
       return reg.test(str);
    }
	
 	function test(tb)
    {
		var xmlhttp;
		xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","GetAttribute.php?TableName="+tb,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function()
  		{
  			if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    			document.getElementById("Select_Attribute").options.length=0;
	    		var json_data=xmlhttp.responseText;//得到一个array作为输出结果
	    		var Attribute=JSON.parse(json_data);
	    		var size=Attribute.length;
	    		//document.getElementById("text_test2").innerHTML=size;
	    		//document.getElementById("text_test").innerHTML=json_data;
	    		var newbox=document.getElementById("Select_Attribute");
	    		for (var i=0;i<size;i++)
	    		{
					var tmp =  document.createElement("option");
		    		tmp.text=Attribute[i];
		    		newbox.add(tmp);
				}
    		}
    		/*-*/
  		}  		  		
	}
    
	function InsertIntoTable(tableid)//tableid
	{
		var attribute_name=document.getElementById("Select_Attribute").value;
		//document.getElementById("text_test").innerHTML=tableid;
		
		if(attribute_name!=null)
		{	
			var newtable=document.getElementById(tableid);
			var tmp =  document.createElement("option");
			tmp.text=attribute_name;
			newtable.add(tmp);
		}
	}
	function DeleteItem(tableid)//tableid
	{
		var newtable=document.getElementById(tableid);
		var CurrentItem=newtable.value;
		
		for (var i=0;i<newtable.options.length;i=i+1)
		{
			if(newtable.options[i].value==CurrentItem && CurrentItem!=null)
			{
				newtable.options.remove(i);
				break;
			}
		}
	}
	function MoveUp(tableid)
	{
		var Current_Table=document.getElementById(tableid);
		var Current_Item=Current_Table.value;
		//document.getElementById("text_test").innerHTML=Current_Table.options.length;
		for (var i=0;i<Current_Table.options.length;i=i+1)
		{
			if(Current_Table.options[i].value==Current_Item && Current_Item!=null)
			{
				var tmp_option=Current_Item
				//document.getElementById("text_test").innerHTML=tmp_option;
				Current_Table.options.remove(i);
				var New_Option = document.createElement("option");
				New_Option.text=tmp_option;
				Current_Table.add(New_Option,Current_Table[i-1]);
				Current_Table.value=Current_Table.options[i-1];
				break;
			}
		}
	}
	function  MoveDown(tableid)
	{
		var Current_Table=document.getElementById(tableid);
		var Current_Item=Current_Table.value;
		//document.getElementById("text_test").innerHTML=Current_Table.options.length;
		for (var i=0;i<Current_Table.options.length;i=i+1)
		{
			if(Current_Table.options[i].value==Current_Item && Current_Item!=null)
			{
				var tmp_option=Current_Item
				//document.getElementById("text_test").innerHTML=tmp_option;
				Current_Table.options.remove(i);
				var New_Option = document.createElement("option");
				New_Option.text=tmp_option;
				Current_Table.add(New_Option,Current_Table[i+1]);
				Current_Table.value=Current_Table.options[i+1];
				break;
			}
		}
	}
	function OrderInsert(tableid)
	{
		var attribute_name=document.getElementById("Select_Attribute").value;
		attribute_name=attribute_name.concat("(asc)");
		
		if(attribute_name!=null)
		{	
			var newtable=document.getElementById(tableid);
			var tmp =  document.createElement("option");
			tmp.text=attribute_name;
			newtable.add(tmp);
		}
	}
	function ChangeOrder(tableid)
	{
		var Current_Table=document.getElementById(tableid);
		var Current_Item=Current_Table.value;
		var start=Current_Item.indexOf('(')+1;
		var stop=Current_Item.indexOf(')');
		var IsOrder=Current_Item.substring(start,stop);
		var PreItem=Current_Item.substring(0,start-1);
		//document.getElementById("text_test").innerHTML=PreItem;
		if(IsOrder=="asc")
		{
			IsOrder="desc";
			Current_Item=PreItem+"("+IsOrder+")";
		}
		else
		{
			IsOrder="asc";
			Current_Item=PreItem+"("+IsOrder+")";
		}
		var myindex=Current_Table.selectedIndex;
		//document.getElementById("text_test").innerHTML=myindex;
		Current_Table.remove(myindex);
		var tmp =  document.createElement("option");
		tmp.text=Current_Item;
		Current_Table.add(tmp,Current_Table[myindex]);
	}
	
	function ChangeConstraint(tableid)
	{
		var Current_Table=document.getElementById(tableid);
		var Current_Item=Current_Table.value;
		
		var sharedObject= new Object();
		sharedObject.Input=Current_Item;
		var Current_Item=showModalDialog("EditValue.php", sharedObject, "dialogWidth:800px; dialogHeight:300px; dialogLeft:900px;"); 
		document.getElementById("text_test").innerHTML=Current_Item;
		var myindex=Current_Table.selectedIndex;
		Current_Table.options[myindex].text=Current_Item;
	}	
	
	function GetSQL()
	{
		var table_1=document.getElementById('Table_1');
		var table_2=document.getElementById('Table_2');
		var table_3=document.getElementById('Table_3');
		var content_1=new Array;
		var content_2=new Array;
		var content_3=new Array;
		for (var i=0;i<table_1.options.length;i++)
		{
			content_1[i]=table_1.options[i].value;
		}
		for (var i=0;i<table_2.options.length;i++)
		{
			content_2[i]=table_2.options[i].value;
		}
		for (var i=0;i<table_3.options.length;i++)
		{
			content_3[i]=table_3.options[i].value;
		}
		
		var xmlhttp;
		xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","CreatePHP.php?table1="+content_1+"&table2="+content_2+"&table3="+content_3,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function()
  		{
  			if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    			var json_data=xmlhttp.responseText
    			document.getElementById("text_test").innerHTML=json_data;
    			document.getElementById("result_query").value=json_data;
    			return json_data;
    		}
    	}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
