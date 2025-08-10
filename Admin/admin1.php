<?php
$change_username = filter_input(INPUT_POST, 'name');
$change_password = filter_input(INPUT_POST, 'password');
$change_phone = filter_input(INPUT_POST, 'phone');
$change_address = filter_input(INPUT_POST, 'address');
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
  
  

		if (($change_username!=NULL) && (($change_password!=NULL)))
		{

			$sql = "UPDATE accounts SET password='$change_password' WHERE email='$user1'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET name='$change_username' WHERE email='$user1'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET phone='$change_phone' WHERE email='$user1'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET address='$change_address' WHERE email='$user1'";
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



$query = "SELECT * FROM accounts WHERE email = '$user1'";
$run_query = mysqli_query($conn, $query);

  $row = mysqli_fetch_assoc($run_query);


  $m_email=$row["email"];
  $m_name=$row["name"];
  $m_password=$row["password"];
  $m_phone=$row["phone"];
  $m_address=$row["address"];
  $m_rank=$row["rank"];


  $m_total_earned=$row["total_earned"];
  $m_balance=$row["balance"];
  $m_left_team=$row["left_team"];
  $m_right_team=$row["right_team"];
  
    $m_sponsor_id=$row["sponsor_id"];
  $m_parent_id=$row["parent_id"];
  
  $m_reward_pkr=$row["reward_pkr"];



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

		<li><a href="send_product.php" style="color:black;">Send Products</a></li>

		</ul>



		<ul >

		<li><a href="../logout.php" style="color:black;">Log Out</a></li>

		</ul>
		
	</nav>







	<div class="container">
	<div class="dashboard">
		<div id="account-summary">
			<h2>Account Summary</h2>
			<table>
				<tr>
					<th>Email</th>
					<td><?php  echo $m_email;?></td>
				</tr>
				<tr>
					<th>Total Earned</th>
					<td><?php  echo $m_total_earned;?></td>
				</tr>
				<tr>
					<th>Balance</th>
					<td><?php  echo $m_balance;?></td>
				</tr>
				
				<tr>
					<th>Rewards Win</th>
					<td><?php  echo $m_reward_pkr;?></td>
				</tr>
				

				<tr>
					<th>Left Team</th>
					<td><?php  echo $m_left_team;?></td>
				</tr>


				<tr>
					<th>Right Team</th>
					<td><?php  echo $m_right_team;?></td>
				</tr>
				
				
				<tr>
					<th>Rank</th>
					<td><?php  echo $m_rank;?></td>
				</tr>
				
				

				
				
				<tr>
					<th>Sponsor Email</th>
					<td><?php  echo $m_sponsor_id;?></td>
				</tr>
				
				
				
				<tr>
					<th>Parent Email</th>
					<td><?php  echo $m_parent_id;?></td>
				</tr>


				<tr>
					<th>Account Status</th>
					<td>Active
					

</td>

				</tr>
			</table>
		</div>






		





<form action="admin1.php?var=<?php echo $m_email;?>" method="post">
  <h2 style="text-align: center;">Edit Profile</h2>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" value="<?php echo $m_name;?>">
  <label for="password">Password:</label>
  <input type="text" id="password" name="password" value="<?php echo $m_password;?>">

  <label for="password">Phone No:</label>
  <input type="text" id="phone" name="phone" value="<?php echo $m_phone;?>">

  <label for="password">Address:</label>
  <input type="text" id="address" name="address" value="<?php echo $m_address;?>">

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
