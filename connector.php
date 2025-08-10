<?php
$username1 = filter_input(INPUT_POST, 'username');
$email1 = filter_input(INPUT_POST, 'email');
$password1 = filter_input(INPUT_POST, 'password');
$confirm_password1 = filter_input(INPUT_POST, 'confirm_password');
$phone_number1 = filter_input(INPUT_POST, 'phone_number');
$sponsor_email1 = filter_input(INPUT_POST, 'sponsor_email');
$amount1 = filter_input(INPUT_POST, 'amount');

if ($password1!=$confirm_password1)
{

  echo "Both Passwords Does not Matched";
  die();

}



if ((!empty($email1)) && (!empty($username1)) && (!empty($password1)) && (!empty($phone_number1)) && (!empty($sponsor_email1)) && (!empty($amount1)))
{
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




            $sql = "SELECT * FROM accounts WHERE email='$email1'";
            $results = mysqli_query($conn, $sql);
            if (mysqli_num_rows($results) > 0) 
            {
              echo "Email already exists";
            }




            else 
            {






              $sql = "SELECT * FROM accounts WHERE email='$sponsor_email1'";
              $results = mysqli_query($conn, $sql);
              if (mysqli_num_rows($results) ==1) 
              {
                $sql = "INSERT INTO accounts (email,username, password, phone_number, sponsor_email, deposit_fee)
                values ('$email1','$username1','$password1', '$phone_number1', '$sponsor_email1', '$amount1')";
                $conn->query($sql);
                $key=1;
              }


              else
              {
                  echo"Invalid Link i.e Sponsor Not Found.";

              }



/*
              $targetDir = 'uploads/'.$username1;

              $fileName = basename($_FILES["file"]["name"]);
              $targetFilePath = $targetDir . $fileName;
              $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
              $statusMsg = '';




              if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        // Insert image file name into database
                        $insert = $conn->query("UPDATE accounts SET file_name='".$username1.$fileName."' WHERE username='$username1'");
                        if($insert){
                            //$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                            $sql = "UPDATE accounts SET profile_pic='1' WHERE username='$username1'";
                            $run_sql = mysqli_query($conn, $sql);


                          }
                        
                          else{
                              $statusMsg = "File upload failed, please try again.";
                          } 
                      }else{
                          $statusMsg = "Sorry, there was an error uploading your file.";
                      }
                  }else{
                      $statusMsg = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';
                  }
              }else{
                  $statusMsg = 'Please select a file to upload.';
              }

              echo $statusMsg;
*/



             

              if ($key == 1)
              {
                header("Location: login.php");
              }

              else
              {

                echo "Contact to Admin";
              }



            }

            
        }
}


else
{
    echo "Missing Information....Please Fill all the Information again.";
    die();
}
?>





