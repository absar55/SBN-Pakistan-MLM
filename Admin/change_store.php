<?php
$change_username = filter_input(INPUT_POST, 'name');
$change_price = filter_input(INPUT_POST, 'price');

session_start();


$var = explode(",", $_GET["var"]);
$user1=$var[0];



if(!isset($_SESSION['color'])){
	header('location:login.php');
  }


  $email1= $_SESSION['email'];
  $host = "serverxyz";
  $dbusername = "sbn";
  $dbpassword = "passwordxyz";
  $dbname = "xyzabc";
  // Create connection
  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
	if (mysqli_connect_error())
	{
	  die('Connect Error ('. mysqli_connect_errno() .') '
	 . mysqli_connect_error());
	}
	else
	{
  
  

		if (($change_username!=NULL) && (($change_price!=NULL)))
		{

			$sql = "UPDATE products SET product_name='$change_username' WHERE id='$user1'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE products SET price='$change_price' WHERE id='$user1'";
			$run_sql = mysqli_query($conn, $sql);







		}






$query = "SELECT * FROM accounts WHERE email = '$email1'";
$run_query = mysqli_query($conn, $query);

  $row = mysqli_fetch_assoc($run_query);



  $role=$row["role"];


if ($role=="member")
{
	header('location:../Dashboard');

}



$query = "SELECT * FROM products WHERE id = '$var[0]'";
$run_query = mysqli_query($conn, $query);

  $row = mysqli_fetch_assoc($run_query);

  $p_id=$row["id"];

  $p_name=$row["product_name"];
  $p_price=$row["price"];







}



?>
 








<!DOCTYPE html>
<html>
<style>
/* Global Styles */
/* Global Styles */

* {
	box-sizing: border-box;
}

body {
	font-family: Arial, sans-serif;
	margin: 0;
	padding: 0;
}

h1 {
	font-size: 36px;
	font-weight: bold;
	margin-bottom: 20px;
}

h2 {
	font-size: 24px;
	font-weight: bold;
	margin-bottom: 10px;
}

p {
	font-size: 16px;
	line-height: 1.5;
	margin-bottom: 20px;
}

button {
	background-color: #4CAF50;
	color: #fff;
	border: none;
	padding: 10px 20px;
	border-radius: 5px;
	cursor: pointer;
}

button:hover {
	background-color: #3e8e41;
}

input[type=text], input[type=email], input[type=tel], textarea {
	width: 100%;
	padding: 12px;
	border: 1px solid #ccc;
	border-radius: 4px;
	resize: vertical;
}

label {
	display: block;
	font-weight: bold;
	margin-bottom: 5px;
}

table {
	border-collapse: collapse;
	width: 100%;
	margin-bottom: 20px;
}

th, td {
	text-align: left;
	padding: 12px;
}

th {
	background-color: #4CAF50;
	color: #fff;
}

tr:nth-child(even) {
	background-color: #f2f2f2;
}
/* Layout Styles */

.container {
	display: flex;
	flex-wrap: wrap;
}

.dashboard {
	flex: 3;
	padding: 20px;
}

.sidebar {
	flex: 1;
	background-color: #f2f2f2;
	padding: 20px;
}

#transaction-history {
	margin-bottom: 40px;
}

#edit-profile {
	max-width: 600px;
	margin: 0 auto;
}
/* Login Page Styles */

.login-page {
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
}

.login-form {
	background-color: #f2f2f2;
	padding: 20px;
	border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
	max-width: 500px;
	margin: 0 auto;
}

.login-form h2 {
	text-align: center;
	margin-bottom: 20px;
}

.login-form label {
	display: block;
	margin-bottom: 5px;
}

.login-form input[type=text], .login-form input[type=password] {
	width: 100%;
	padding: 10px;
	margin-bottom: 10px;
	border: none;
	border-radius: 5px;
	background-color: #fff;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.login-form button {
	background-color: #4CAF50;
	color: #fff;
	border: none;
	padding: 10px 20px;
	border-radius: 5px;
	cursor: pointer;
	width: 100%;
}

.login-form button:hover {
	background-color: #3e8e41;
}

/* Account Details Styles */

.account-details {
	max-width: 600px;
	margin: 0 auto;
	background-color: #f2f2f2;
	padding: 20px;
	border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.account-details h2 {
	margin-bottom: 20px;
}

.account-details label {
	display: block;
	font-weight: bold;
	margin-bottom: 5px;
}

.account-details p {
	margin-bottom: 10px;
}

.account-details input[type=text], .account-details input[type=email], .account-details input[type=tel], .account-details textarea {
	margin-bottom: 20px;
}

.account-details button {
	background-color: #4CAF50;
	color: #fff;
	border: none;
	padding: 10px 20px;
	border-radius: 5px;
	cursor: pointer;
}

.account-details button:hover {
	background-color: #3e8e41;
}

/* Transaction History Styles */

.transaction-history-table {
	max-width: 800px;
	margin: 0 auto;
}

.transaction-history-table th:first-child, .transaction-history-table td:first-child {
	width: 30%;
}

.transaction-history-table th:nth-child(2), .transaction-history-table td:nth-child(2) {
	width: 20%;
}

.transaction-history-table th:nth-child(3), .transaction-history-table td:nth-child(3) {
	width: 25%;
}

.transaction-history-table th:last-child, .transaction-history-table td:last-child {
	width: 25%;
}

.transaction-history-table button {
	background-color: #4CAF50;
	color: #fff;
	border: none;
	padding: 5px 10px;
	border-radius: 5px;
	cursor: pointer;
}

.transaction-history-table button:hover {
	background-color: #3e8e41;
}
form {
   margin: 50px auto;
   width: 90%;
   background-color: #DFF2FF;
   box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
   padding: 20px;
  }
  

	</style>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="Styles/style.css">
</head>
<body style="  background-color: lightblue;">
	<header>
	
                       
                       
                    
		<h1>Admin Dashboard</h1>

	</header>
	<nav>

		<ul >

		<li><a href="admin.php" style="color:black;">All Accounts</a></li>

		</ul>
		<ul >

			<li><a href="active_members.php" style="color:black;">Activate Accounts</a></li>

		</ul>


		<ul >

		<li><a href="send_withdrawal.php" style="color:black;">Send Withdrawals</a></li>

		</ul>


		<ul >

		<li><a href="store.php" style="color:black;">Store</a></li>

		</ul>


		<ul >

		<li><a href="send_product.php" style="color:black;">Send Products</a></li>

		</ul>



		<ul >

		<li><a href="../logout.php" style="color:black;">Log Out</a></li>

		</ul>
		
	</nav>







	<div class="container">
	<div class="dashboard">
	




		





<form action="change_store.php?var=<?php echo $p_id;?>" method="post">
  <h2 style="text-align: center;">Edit Profile</h2>
  <label for="name">Product Name:</label>
  <input type="text" id="name" name="name" value="<?php echo $p_name;?>">


  <label for="password"><br><br>Price:</label>
  <input type="number" id="price" name="price" value="<?php echo $p_price;?>">



  <div style="text-align: center;">

  <button type="submit">Save Changes</button>
</div>
 </form>






	<footer>
		<p style="text-align: center; padding-top:10%;">&copy; 2023 SBN Pakistan Dashboard</p>
	</footer>
	<script src="JavaScript/function1.js"></script>
</body>
</html>
