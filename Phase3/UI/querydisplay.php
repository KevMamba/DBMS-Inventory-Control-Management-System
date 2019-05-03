<html>
<?php
	extract($_POST);
	
	$host = "localhost";
	$port = 5432;
	$database = "inventory_management";
	$user = "postgres";
	$password = "postgres";

	$conn = new PDO("pgsql:host=$host port=$port dbname=$database user=$user password=$password");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<body>

<div style="margin-left:800px; margin-bot:500px">
	<button class="btn-success" onclick="location.href = '/DBMS'">GO back</button>
</div>

<table class="table table-striped table-bordered table-hover" style="position:absolute; top:50px; left:150px; width:1500px;">
<?php
	if($qbutton=="query1")
	{	
		$query1="select i_id,i_name,SUM(i_price*sell_quantity) as moneys from items natural join sell natural join sell_map group by i_id,i_name order by moneys desc;";
		$query1= $conn->query($query1);
	
		echo "<tr>
		    <th>Item_ID</th>
		    <th>Item_Name</th>
		    <th>Money</th>
		</tr>";
		while($result = $query1-> fetch(\PDO::FETCH_ASSOC)) 
		{
		    echo "<tr>
			<td>" . $result['i_id'] . "</td>
			<td>" . $result['i_name'] . "</td>
			<td>" . $result['moneys'] . "</td>
		      </tr><br>"; 
		}
	}
	if($qbutton=="query2")
	{
		$query2="select w_id,c_name,SUM(w_quantity) as sum_quantity from w_map natural join items natural join category group by w_id,c_name order by w_id asc;";
		$query2= $conn->query($query2);
	
		echo "<tr>
		    <th>Warehouse_ID</th>
		    <th>Category_Name</th>
		    <th>Sum_Quantity</th>
		</tr>";

		while($result = $query2-> fetch(\PDO::FETCH_ASSOC)) 
		{
			echo "<tr>
			<td>" . $result['w_id'] . "</td>
			<td>" . $result['c_name'] . "</td>
			<td>" . $result['sum_quantity'] . "</td>
		      </tr><br>";   
		}
	}

	if($qbutton=="query3")
	{
		$query3="select c_id,SUM(i_price*sell_quantity) as moneys from items natural join sell natural join sell_map group by c_id order by c_id asc;";
		$query3= $conn->query($query3);

		echo "<tr>
		    <th>Category_ID</th>
		    <th>Money</th>
		</tr>";

		while($result = $query3-> fetch(\PDO::FETCH_ASSOC)) 
		{
			echo "<tr>
			<td>" . $result['c_id'] . "</td>
			<td>" . $result['moneys'] . "</td>
		      </tr><br>";          
		}
	}

	if($qbutton=="query4")
	{
		$query4="select i_name,sum(sell_quantity)/i_price as ratio from sell natural join sell_map natural join items group by i_name,i_price order by ratio desc;";
		$query4= $conn->query($query4);
		echo "<tr>
		    <th>Item_Name</th>
		    <th>Quanity/Price</th>
		</tr>";
		while($result = $query4-> fetch(\PDO::FETCH_ASSOC)) 
		{
			echo "<tr>
			<td>" . $result['i_name'] . "</td>
			<td>" . $result['ratio'] . "</td>
		      </tr><br>";  
		}
	}

	if($qbutton=="query5")
	{
		$query5="select sell_id,i_name from sell natural join sell_map natural join items where (sell_id,i_price*sell_quantity) in (select sell_id,max(i_price*sell_quantity) as money from sell natural join sell_map natural join items group by sell_id having sell_price>7000);";
		$query5= $conn->query($query5);
		echo "<tr>
		    <th>Sell_ID</th>
		    <th>Item_Name</th>
		</tr>";
		while($result = $query5-> fetch(\PDO::FETCH_ASSOC)) 
		{
			echo "<tr>
			<td>" . $result['sell_id'] . "</td>
			<td>" . $result['i_name'] . "</td>
		      </tr><br>";          
		}
	}

	if($qbutton=="query6")
	{
		$query6=" select sup_id,sup_name,c_name,sup_rating from category join supplier on sup_category=c_id where (c_id,sup_rating) in ( select c_id,MAX(sup_rating) from supplier join category on sup_category=c_id group by c_id order by c_id asc);";
		$query6= $conn->query($query6);
		echo "<tr>
		    <th>Supplier_ID</th>
		    <th>Supplier_Name</th>
		    <th>Category_Name</th>
		    <th>Supplier_Rating</th>
		</tr>";
		while($result = $query6-> fetch(\PDO::FETCH_ASSOC)) 
		{
			echo "<tr>
			<td>" . $result['sup_id'] . "</td>
			<td>" . $result['sup_name'] . "</td>
			<td>" . $result['c_name'] . "</td>
			<td>" . $result['sup_rating'] . "</td>
		      </tr><br>";                  
		}
	}

	if($qbutton=="query7")
	{
		$query7="select c_id,i_id,SUM(i_price*sell_quantity) as moneys from items natural join sell natural join sell_map group by i_id,c_id order by c_id asc;";
		$query7= $conn->query($query7);
		echo "<tr>
		    <th>Category_ID</th>
		    <th>Item_ID</th>
		    <th>Money</th>
		</tr>";
		while($result = $query7-> fetch(\PDO::FETCH_ASSOC)) 
		{
			echo "<tr>
			<td>" . $result['c_id'] . "</td>
			<td>" . $result['i_id'] . "</td>
			<td>" . $result['moneys'] . "</td>
		      </tr><br>";  
		}
	}

	if($qbutton=="query8") 
	{
		$query8="select c_id,i_id,i_name,moneys from items natural join moneyview where (c_Id,moneys) in (select c_id,max(moneys) as moneys from moneyview group by moneyview.c_id order by c_id asc);";
		$query8= $conn->query($query8);
		echo "<tr>
		    <th>Category_ID</th>
		    <th>Item_ID</th>
		    <th>Item_Name</th>
		    <th>Money</th>
		</tr>";
		while($result = $query8-> fetch(\PDO::FETCH_ASSOC)) 
		{
			echo "<tr>
			<td>" . $result['c_id'] . "</td>
			<td>" . $result['i_id'] . "</td>
			<td>" . $result['i_name'] . "</td>
			<td>" . $result['moneys'] . "</td>
		      </tr><br>"; 
		}
	} 
?>

</table>

</body>
</html>
