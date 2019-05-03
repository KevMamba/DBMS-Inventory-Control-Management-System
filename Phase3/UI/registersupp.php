<html>
<?php
	extract($_POST);

	$host = "localhost";
	$port = 5432;
	$database = "inventory_management";
	$user = "postgres";
	$password = "postgres";
	$category=rand(0,20);

	$conn = new PDO("pgsql:host=$host port=$port dbname=$database user=$user password=$password");

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "<br>Connected successfully";

	$query="INSERT INTO SUPPLIER VALUES(DEFAULT,0,'$sup_name','$category')";
	$conn->exec($query);	
	
?>
	<script type="text/javascript">location.href = '/DBMS';</script>
</html>
