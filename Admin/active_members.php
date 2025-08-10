<?php

$variable[0] = filter_input(INPUT_POST, 'm_email');

session_start(); 
error_reporting(E_ERROR | E_PARSE);

//$variable = explode(",", $_GET["var"]);
    
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


	$query = "SELECT * FROM accounts WHERE email = '$email1'";
	$run_query = mysqli_query($conn, $query);
	
	  $row = mysqli_fetch_assoc($run_query);
 


	  $role=$row["role"];


	  if ($variable[0]!=NULL)
  
      {
			//Work mlm
			$new_email=$variable[0];

			$query = "SELECT * FROM new_account_requests WHERE email = '$new_email'";
			$run_query = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($run_query);

			$new_name=$row["name"];
			$new_password=$row["password"];
			$new_phone=$row["phone"];
			$new_dob=$row["dob"];
			$new_address=$row["address"];
			$leg=$row["leg"];
			$sponsor_id=$row["sponsor_email"];




			$sql = "INSERT INTO accounts (email, password, name, phone, dob, address, leg, sponsor_id)
			values ('$new_email','$new_password','$new_name','$new_phone','$new_dob','$new_address', '$leg','$sponsor_id')";
			$conn->query($sql);
	
//Direct Code
			$sql = "INSERT INTO direct (new_email, email, leg)
			values ('$new_email','$sponsor_id','$leg')";
			$conn->query($sql);


			$sql = "INSERT INTO statement ( email, reason, way, amount)
			values ('$sponsor_id','$new_email','Direct','300')";
			$conn->query($sql);




//Indirect Downward Here Code Here
$starter=$sponsor_id;

$key=0;
			while ($key!=1)
			{


			$key1=0;
			$key2=0;
			$left_counter=0;
			$right_counter=0;
			$level=0;
			$query = "SELECT * FROM accounts WHERE email = '$starter'";
			$run_query = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($run_query);

			$left_counter=$row["left_counter"];
			$right_counter=$row["right_counter"];
			$level=$row["level"];
			$total_earned=$row["total_earned"];
			$money=$row["balance"];
			$left_team=$row["left_team"];
			$right_team=$row["right_team"];
			$left_id=$row["left_id"];
			$right_id=$row["right_id"];
			$parent_id=$row["parent_id"];
			$rank=$row["rank"];
			$pre_rank=$row["pre_rank"];


			

			if ($leg=="right")
			{
				$right_counter++;
				$right_team++;
				if ($right_id==NULL)
				{
					
					$sql = "UPDATE accounts SET right_id='$new_email' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET parent_id='$starter' WHERE email='$new_email'";
					$run_sql = mysqli_query($conn, $sql);

					$key=1;
				}

				else
				{
					//$start=$right_id;
					$key1=1;

				}
			}

			else if ($leg=="left")
			{
				$left_counter++;	
				$left_team++;
	
				
				if ($left_id==NULL)
				{
					
					$sql = "UPDATE accounts SET left_id='$new_email' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET parent_id='$starter' WHERE email='$new_email'";
					$run_sql = mysqli_query($conn, $sql);

					$key=1;
				}

				else
				{
					//$start=$left_id;
					$key2=1;


				}
			}


			if (($right_counter>=1) && ($left_counter>=1))
			{
				if ($level==0)
				{
					$value=300;
					$money=$money+300;
					$total_earned=$total_earned+300;
				}

				else if (($level>0) && ($level<=100))
				{

					$value=200;
					$money=$money+200;
					$total_earned=$total_earned+200;

				}
				
				
				else if ($level>100)
				{

					$value=100;
					$money=$money+100;
					$total_earned=$total_earned+100;

				}


				$level++;
				
				
				if ($level<=9)
				{
				    $rank="Beginner";
				    
				}
				
				else if (($level>=10) && ($level<=29))
				{
				    $rank="1 Star";
				    
				}
				else if (($level>=30) && ($level<=99))
				{
				    
				    $rank="2 Star";
				    
				}
				
				
				else if (($level>=100) && ($level<=499))
				{
				    
				    $rank="3 Star";
				    
				}
				
				
				else if (($level>=500) && ($level<=999))
				{
				    
				    $rank="4 Star";
				    
				}
				
				else if (($level>=1000) && ($level<=2499))
				{
				    
				    $rank="5 Star";
				    
				}
				
				else if (($level>=2500) && ($level<=4999))
				{
				    
				    $rank="6 Star";
				    
				}
				
				else if (($level>=5000) && ($level<=9999))
				{
				    
				    $rank="7 Star";
				    
				}
				
				else if (($level>=10000) && ($level<=19999))
				{
				    
				    $rank="8 Star";
				    
				}
				
				else if (($level>=20000) && ($level<=29999))
				{
				    
				    $rank="9 Star";
				    
				}
				
				else if (($level>=30000) && ($level<=39999))
				{
				    
				    $rank="10 Star";
				    
				}
				
				else if (($level>=40000) && ($level<=49999))
				{
				    
				    $rank="11 Star";
				    
				}	
				
				else if ($level>=50000)
				{
				    
				    $rank="12 Star";
				    
				}
				

				$right_counter--;
				$left_counter--;


				$sql = "INSERT INTO statement ( email, reason, way, amount)
				values ('$starter','$new_email','Indirect','$value')";
				$conn->query($sql);

			}




			$sql = "UPDATE accounts SET rank='$rank' WHERE email='$starter'";
			$run_sql = mysqli_query($conn, $sql);


			$sql = "UPDATE accounts SET left_counter='$left_counter' WHERE email='$starter'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET right_counter='$right_counter' WHERE email='$starter'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET level='$level' WHERE email='$starter'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET total_earned='$total_earned' WHERE email='$starter'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET balance='$money' WHERE email='$starter'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET left_team='$left_team' WHERE email='$starter'";
			$run_sql = mysqli_query($conn, $sql);

			$sql = "UPDATE accounts SET right_team='$right_team' WHERE email='$starter'";
			$run_sql = mysqli_query($conn, $sql);

                    if ($pre_rank!=$rank)
                    {
                        if ($rank=="4 Star")
                        {
                            $add_reward=20000;
                            
                        } 
                        
                        else if ($rank=="5 Star")
                        {
                            $add_reward=30000;

                            
                        }
                        
                        
                        else if ($rank=="6 Star")
                        {
                            $add_reward=50000;

                            
                        }
                        
                        
                        
                        else if ($rank=="7 Star")
                        {
                            $add_reward=120000;

                            
                        }
                        
                        else if ($rank=="8 Star")
                        {
                            $add_reward=250000;

                            
                        }
                        
                        
                        else if ($rank=="9 Star")
                        {
                            $add_reward=500000;

                            
                        }
                        
                        else if ($rank=="10 Star")
                        {
                            $add_reward=1000000;

                            
                        }
                        
                        else if ($rank=="11 Star")
                        {
                            $add_reward=1500000;

                            
                        }
                        
                        
                        else if ($rank=="12 Star")
                        {
                            $add_reward=2000000;

                            
                        }
                        
                    $sql = "UPDATE accounts SET total_earned=total_earned+'$add_reward' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);
					
					$sql = "UPDATE accounts SET balance=balance+'$add_reward' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);
					
					$sql = "UPDATE accounts SET pre_rank='$rank' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);
					
				    $sql = "UPDATE accounts SET reward_pkr=reward_pkr+'$add_reward' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);
                        
                    }




            if ($starter!=$sponsor_id)
            {
			$sql = "INSERT INTO indirect (new_email, email, leg)
			values ('$new_email','$starter','$leg')";
			$conn->query($sql);
            }



			if ($key1==1)
			{

					$starter=$right_id;
					$key1=0;
					$key2=0;


			}

			else if ($key2==1)
			{


				$starter=$left_id;
				$key1=0;
				$key2=0;

			}

		}





//Indirect Upward Here Code Here

$query = "SELECT * FROM accounts WHERE email = '$sponsor_id'";
$run_query = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($run_query);

$starter=$row["parent_id"];
$previous=$sponsor_id;

		$key=0;
					while ($starter!=NULL)
					{


					$key1=0;
					$key2=0;
					$left_counter=0;
					$right_counter=0;
					$level=0;
					$query = "SELECT * FROM accounts WHERE email = '$starter'";
					$run_query = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($run_query);

					$left_counter=$row["left_counter"];
					$right_counter=$row["right_counter"];
					$level=$row["level"];
					$total_earned=$row["total_earned"];
					$money=$row["balance"];
					$left_team=$row["left_team"];
					$right_team=$row["right_team"];
					$left_id=$row["left_id"];
					$right_id=$row["right_id"];
					$parent_id=$row["parent_id"];
					$rank=$row["rank"];
					$pre_rank=$row["pre_rank"];



					if ($left_id==$previous)
					{

							$leg="left";
					}

					else if ($right_id==$previous)
					{

							$leg="right";
					}


					

					if ($leg=="right")
					{
						$right_counter++;
						$right_team++;

						/*if ($right_id==NULL)
						{
							
							$sql = "UPDATE accounts SET right_id='$new_email' WHERE email='$starter'";
							$run_sql = mysqli_query($conn, $sql);

							$sql = "UPDATE accounts SET parent_id='$starter' WHERE email='$new_email'";
							$run_sql = mysqli_query($conn, $sql);

							$key=1;
						}

						else
						{
							//$start=$right_id;
							$key1=1;

						}
						*/
					}

					else if ($leg=="left")
					{
						$left_counter++;	
						$left_team++;
	
						
						/*if ($left_id==NULL)
						{
							
							$sql = "UPDATE accounts SET left_id='$new_email' WHERE email='$starter'";
							$run_sql = mysqli_query($conn, $sql);

							$sql = "UPDATE accounts SET parent_id='$starter' WHERE email='$new_email'";
							$run_sql = mysqli_query($conn, $sql);

							$key=1;
						}

						else
						{
							//$start=$left_id;
							$key2=1;


						}*/
					}


					if (($right_counter>=1) && ($left_counter>=1))
					{
						if ($level==0)
						{
							$value=300;
							$money=$money+300;
							$total_earned=$total_earned+300;
						}

        				else if (($level>0) && ($level<=100))
        				{
        
        					$value=200;
        					$money=$money+200;
        					$total_earned=$total_earned+200;
        
        				}
        				
        				
        				else if ($level>100)
        				{
        
        					$value=100;
        					$money=$money+100;
        					$total_earned=$total_earned+100;
        
        				}


						$level++;
						
						
				if ($level<=9)
				{
				    $rank="Beginner";
				    
				}
				
				else if (($level>=10) && ($level<=29))
				{
				    $rank="1 Star";
				    
				}
				else if (($level>=30) && ($level<=99))
				{
				    
				    $rank="2 Star";
				    
				}
				
				
				else if (($level>=100) && ($level<=499))
				{
				    
				    $rank="3 Star";
				    
				}
				
				
				else if (($level>=500) && ($level<=999))
				{
				    
				    $rank="4 Star";
				    
				}
				
				else if (($level>=1000) && ($level<=2499))
				{
				    
				    $rank="5 Star";
				    
				}
				
				else if (($level>=2500) && ($level<=4999))
				{
				    
				    $rank="6 Star";
				    
				}
				
				else if (($level>=5000) && ($level<=9999))
				{
				    
				    $rank="7 Star";
				    
				}
				
				else if (($level>=10000) && ($level<=19999))
				{
				    
				    $rank="8 Star";
				    
				}
				
				else if (($level>=20000) && ($level<=29999))
				{
				    
				    $rank="9 Star";
				    
				}
				
				else if (($level>=30000) && ($level<=39999))
				{
				    
				    $rank="10 Star";
				    
				}
				
				else if (($level>=40000) && ($level<=49999))
				{
				    
				    $rank="11 Star";
				    
				}	
				
				else if ($level>=50000)
				{
				    
				    $rank="12 Star";
				    
				}

						$right_counter--;
						$left_counter--;


						$sql = "INSERT INTO statement ( email, reason, way, amount)
						values ('$starter','$new_email','Indirect','$value')";
						$conn->query($sql);

					}



					$sql = "UPDATE accounts SET rank='$rank' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET left_counter='$left_counter' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET right_counter='$right_counter' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET level='$level' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET total_earned='$total_earned' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET balance='$money' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET left_team='$left_team' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);

					$sql = "UPDATE accounts SET right_team='$right_team' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);


                    if ($pre_rank!=$rank)
                    {
                        if ($rank=="4 Star")
                        {
                            $add_reward=20000;
                            
                        } 
                        
                        else if ($rank=="5 Star")
                        {
                            $add_reward=30000;

                            
                        }
                        
                        
                        else if ($rank=="6 Star")
                        {
                            $add_reward=50000;

                            
                        }
                        
                        
                        
                        else if ($rank=="7 Star")
                        {
                            $add_reward=120000;

                            
                        }
                        
                        else if ($rank=="8 Star")
                        {
                            $add_reward=250000;

                            
                        }
                        
                        
                        else if ($rank=="9 Star")
                        {
                            $add_reward=500000;

                            
                        }
                        
                        else if ($rank=="10 Star")
                        {
                            $add_reward=1000000;

                            
                        }
                        
                        else if ($rank=="11 Star")
                        {
                            $add_reward=1500000;

                            
                        }
                        
                        
                        else if ($rank=="12 Star")
                        {
                            $add_reward=2000000;

                            
                        }
                        
                    $sql = "UPDATE accounts SET total_earned=total_earned+'$add_reward' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);
					
					$sql = "UPDATE accounts SET balance=balance+'$add_reward' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);
					
					$sql = "UPDATE accounts SET pre_rank='$rank' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);
					
					$sql = "UPDATE accounts SET reward_pkr=reward_pkr+'$add_reward' WHERE email='$starter'";
					$run_sql = mysqli_query($conn, $sql);
                        
                    }



            if ($starter!=$sponsor_id)
            {
					$sql = "INSERT INTO indirect (new_email, email, leg)
					values ('$new_email','$starter','$leg')";
					$conn->query($sql);

            }


					//if ($key1==1)
					//{
							$previous=$starter;
							$starter=$parent_id;
							$key1=0;
							$key2=0;


				//	}

					//else if ($key2==1)
					//{


					//	$starter=$left_id;
					//	$key1=0;
					//	$key2=0;

					//}

				}



			


//Deleting
			$sql = "DELETE FROM new_account_requests WHERE email='$new_email'";
			$run_sql = mysqli_query($conn, $sql);
			
			
			$sql = "SELECT * FROM new_account_requests WHERE email='$new_email'" ;
            $results = mysqli_query($conn, $sql);
      
      

			
			if (!($row = mysqli_fetch_assoc($results)))
			{
			header('location:Created.html');
			}

      }


if ($role=="member")
{
  header('location:../Dashboard');

}





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






	<main>
	<h2><br></h2>
		<h2>&nbsp;&nbsp;Active New Accounts</h2>
		<table>
			<thead>
				<tr>
					<th>New Member Email</th>
					<th>Name</th>
					<th>Password</th>
					<th>Phone No</th>
					<th>DOB</th>
					<th>Address</th>
					<th>Sponsor Email</th>
					<th>Leg</th>
					<th>Payment Sent From</th>
					<th>Transaction ID</th>
					<th>Receipt</th>
					<th>Status</th>
					<th>Mark as Send</th>
				</tr>
			</thead>
			<tbody>
<?php
      $sql = "SELECT * FROM new_account_requests" ;
      $results = mysqli_query($conn, $sql);



      while ($row = mysqli_fetch_assoc($results))
      {

		$id=$row["id"];
		$m_email=$row["email"];
		$m_password=$row["password"];
		$m_name=$row["name"];
		$m_phone=$row["phone"];
		$dob=$row["dob"];
		$m_address=$row["address"];
		$wallet=$row["wallet"];
		$receiver_number=$row["receiver_number"];
		$txid=$row["tx_id"];
		$sponsor_email=$row["sponsor_email"];
		$leg=$row["leg"];
		$br=$row["br"];




?>
				<tr>



					<td><?php echo $m_email; ?></td>
					<td><?php echo $m_name; ?></td>
					<td><?php echo $m_password; ?></td>
					<td><?php echo $m_phone; ?></td>
					<td><?php echo $dob; ?></td>
					<td><?php echo $m_address; ?></td>
					<td><?php echo $sponsor_email; ?></td>
					<td><?php echo $leg; ?></td>
					<td><?php echo $receiver_number; ?>&nbsp;<?php echo $wallet; ?></td>
					<td><?php echo $txid; ?></td>

					<td>

					<button onclick="location.href='../Dashboard/uploads/<?php echo $br;?>';">View</button>

					</td>
					<td>Pending</td>


					<td>

                        <form method="POST" enctype="multipart/form-data" action="active_members.php">
            
            
            
            
                         <input type="hidden" name="m_email" value="<?php echo $m_email;?>">

					        <button  type="submit" name="submit">Active</button>

            
            
            
                        </form>

				



					

					</td>




				</tr>
<?php

}
?>	

			</tbody>
		</table>
	</main>




	<footer>
		<p style="text-align: center; padding-top:10%;">&copy; 2023 SBN Pakistan Dashboard</p>
	</footer>
	<script src="JavaScript/function1.js"></script>
</body>
</html>
