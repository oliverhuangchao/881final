<?php
/*----- Create the sql -----------*/
include_once("dbconnect.inc.php");
$mysqli = new mysqli($host,$user,$password,$database);
$str_1=$_GET['table1'];
$str_2=$_GET['table2'];
$str_3=$_GET['table3'];
$table_str="";
$tmp=explode(",",$str_1);
$Select_Content=array();
$Orderby_Content=array();
$Constrain_Content=array();
/* --------------- 获得所有的table名字部分 --------------------*/
//------------------select table-----------------------
for ($i=0;$i<count($tmp);$i++)
{
	$Select_Content[$i]=str_replace("::",".",$tmp[$i]);
	$tmp2=explode("::",$tmp[$i]);
	$query="select real_name from mymetadata where tab_name=\"$tmp2[0]\" and show_name=\"$tmp2[1]\"";
	$result=$mysqli->query($query)or die($mysqli->error.__LINE__);
	if($result->num_rows > 0) 
	{
		while($row = mysqli_fetch_row($result)) 
		{
			$real_name=$row[0];
			$Select_Content[$i]=$tmp2[0].".".$real_name;
		}
	}
	$table_str.=$tmp2[0].",";
}
//------------------orderby table-----------------------
$tmp=explode(",",$str_2);
if($str_2!="")
{
	for ($i=0;$i<count($tmp);$i++)
	{
		$Orderby_Content[$i]=str_replace("::",".",$tmp[$i]);
		$tmp2=explode("::",$tmp[$i]);
		//处理一下tmp2的第二部分
		$hhh=$tmp2[1];
		$start=strpos($hhh,"(");
		$end=strpos($hhh,")");
		$tmp2[1]=substr($hhh,0,$start);
		$tmp2[2]=substr($hhh,$start+1);
	
		$query="select real_name from mymetadata where tab_name=\"$tmp2[0]\" and show_name=\"$tmp2[1]\"";
		$result=$mysqli->query($query)or die($mysqli->error.__LINE__);
		if($result->num_rows > 0) 
		{
			while($row = mysqli_fetch_row($result)) 
			{
				$real_name=$row[0];
				$Orderby_Content[$i]=$tmp2[0].".".$real_name."(".$tmp2[2].")";
			}
		}	
		$table_str.=$tmp2[0].",";
	}
}
//echo json_encode($Orderby_Content);
//------------------constrain table-----------------------
$tmp=explode(",",$str_3);

if($str_3!="")
{
	for ($i=0;$i<count($tmp);$i++)
	{
		$Constrain_Content[$i]=str_replace("::",".",$tmp[$i]);
		$tmp2=explode("::",$tmp[$i]);
		
		
		
		$hhh=$tmp2[1];
		$start=strpos($hhh,"[");
		$end=strpos($hhh,"]");
		if($start>0)
		{
			$tmp2[1]=substr($hhh,0,$start);
			$tmp2[2]=substr($hhh,$start+1);
		}
		else
		{
			$tmp2[1]=$tmp2[1];
			$tmp2[2]="";
		}
			
		
		
	
		$query="select real_name from mymetadata where tab_name=\"$tmp2[0]\" and show_name=\"$tmp2[1]\"";
		
		$result=$mysqli->query($query)or die($mysqli->error.__LINE__);
		if($result->num_rows > 0) 
		{
			while($row = mysqli_fetch_row($result)) 
			{
				$real_name=$row[0];
				if($start>0)
					$Constrain_Content[$i]=$tmp2[0].".".$real_name."[".$tmp2[2]."]";
				else
					$Constrain_Content[$i]=$tmp2[0].".".$real_name;
				
			}
		}	
		if($i==count($tmp)-1)
			$table_str.=$tmp2[0];
		else
			$table_str.=$tmp2[0].",";
	}
}
//echo json_encode($Constrain_Content);
/* --------------- 处理获得join部分 --------------------*/

$table_all=explode(",",$table_str);
$result=array_unique($table_all);

$num=0;
foreach ($result as $each_table)
{
	if($each_table!=""){
		$query_array[$num]=$each_table;
		$num++;
	}
	
}

$table_long_array="";
$all_query="";
for ($i=0;$i<count($query_array);$i++)
{
	for ($j=0;$j<count($query_array);$j++)
	{
		if ($i!=$j)
		{
			$one=$query_array[$i];
			$two=$query_array[$j];
			$query="select ConnectWay from JoinConnection where TableNameOne=\"$one\" and TableNameTwo=\"$two\"";
			$result=$mysqli->query($query)or die($mysqli->error.__LINE__);

			if($result->num_rows > 0) 
			{
				while($row = mysqli_fetch_row($result)) 
				{
		 			$all_query.=$row[0].";";
		 		}
		 	}
		}
	}
}

/*----- 得到所有的join -------*/
$tmp=explode(";",$all_query);
$tmp=array_unique($tmp);
$num=0;
$unique_join=array();
if($all_query!="")
{
	foreach ($tmp as $each_query)
	{
		if($each_query!="")
		{
			$unique_join[$num]=$each_query;
			$num++;
		}
	}
}
/*----- 得到所有的table -------*/
$unique_table=array();
if ($unique_join!=null)
{
	for($i=0;$i<count($unique_join);$i++)
	{
		$tmp=explode("=",$unique_join[$i]);
		for($j=0;$j<count($tmp);$j++)
		{
			$tmp2=explode(".",$tmp[$j]);
			$table_long_array.=$tmp2[0].",";
		}
	}
	$tmp=explode(",",$table_long_array);
	$tmp=array_unique($tmp);
	$num=0;
	foreach ($tmp as $each_table)
	{
		if($each_table!="")
		{
			$unique_table[$num]=$each_table;
			$num++;
		}
	}
}
else
{
	$table_long_array=$Select_Content[0];
	$tmp=explode(".",$table_long_array);
	$unique_table[0]=$tmp[0];
}




//
/*--------- construct the whole query --------*/

$final_query="select ";
/*-----  选择显示部分 ----*/
for ($i=0;$i<count($Select_Content);$i++)
{
	if($i==count($Select_Content)-1)
		$final_query.=$Select_Content[$i]." from ";
	else
		$final_query.=$Select_Content[$i].",";
}
/*-----  选择table部分 ----*/
for ($i=0;$i<count($unique_table);$i++)
{
	if($i==count($unique_table)-1)
		$final_query.=$unique_table[$i]." ";
	else
		$final_query.=$unique_table[$i].",";
}
/*-----  选择join部分 ----*/
if (count($unique_join)>0)
{
	$final_query.="where ";
	for ($i=0;$i<count($unique_join);$i++)
	{
		if($i==count($unique_join)-1)
			$final_query.=$unique_join[$i]." ";
		else
			$final_query.=$unique_join[$i]." and ";
	}
}
/*-----  选择 constrain 部分 ----*/
if (count($Constrain_Content)>0)
{
	if(count($unique_join)>0)
	{
		$final_query.=" and ";
	}
	else
	{
		$final_query.=" where ";
	}
	
	for ($i=0;$i<count($Constrain_Content);$i++)
	{
		$tmp1=$Constrain_Content[$i];
		$tmp2=$tmp1;
		//$tmp2=explode(".",$tmp1);
		$tmp3=str_replace("[","",$tmp2);//$tmp2[1]
		$tmp=str_replace("]","",$tmp3);
		//echo $tmp;
		$final_query.=$tmp;
		if($i!=count($Constrain_Content)-1)
		{
			$final_query.=" and ";
		}
		else
		{
			$final_query.=" ";
		}
	}
}
/*-----  选择 orderby 部分 ----*/
if (count($Orderby_Content)>0)
{
	$final_query.=" order by ";
	for ($i=0;$i<count($Orderby_Content);$i++)
	{
		$tmp1=$Orderby_Content[$i];
		$tmp2=$tmp1;
		$tmp3=str_replace("("," ",$tmp2);//$tmp2[1];
		$tmp=str_replace(")","",$tmp3);
		$final_query.=$tmp;

		if($i!=count($Orderby_Content)-1)
		{
			$final_query.=" , ";
		}
		else
		{
			$final_query.=" ";
		}
	}
}
$final_query.=";";
//echo json_encode($Constrain_Content);
echo $final_query;
?>