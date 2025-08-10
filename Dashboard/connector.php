<?php
$username = filter_input(INPUT_POST, 'username');
$new_email = filter_input(INPUT_POST, 'new_email');
$password = filter_input(INPUT_POST, 'password');
$confirm_password = filter_input(INPUT_POST, 'confirm_password');
$phone_number = filter_input(INPUT_POST, 'phone_number');
$dob = filter_input(INPUT_POST, 'dob');
$address = filter_input(INPUT_POST, 'address');
$wallet = filter_input(INPUT_POST, 'wallet');
$rec_number = filter_input(INPUT_POST, 'rec_number');
$tx_id = filter_input(INPUT_POST, 'tx_id');
$sponsor_email = filter_input(INPUT_POST, 'sponsor_email');
$leg = filter_input(INPUT_POST, 'leg');



if ((!empty($username)) && (!empty($new_email)) && (!empty($password)) && (!empty($confirm_password)) && (!empty($phone_number)) && (!empty($dob)) && (!empty($address)) && (!empty($wallet)) && (!empty($rec_number)) && (!empty($tx_id)) && (!empty($sponsor_email)) && (!empty($leg)))
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




            $sql = "SELECT * FROM accounts WHERE email='$new_email'";
            $results = mysqli_query($conn, $sql);
            if (mysqli_num_rows($results) > 0) 
            {
              echo "Email already exists";
              
            }
            





            else 
            {


              
            $sql = "SELECT * FROM new_account_requests WHERE email='$new_email'";
            $results = mysqli_query($conn, $sql);
            if (mysqli_num_rows($results) > 0) 
            {
              echo "Email already exists";
              
            }


            else
            {


              if ($password!=$confirm_password) 
              {
                echo "Both Passwords Does Not Match";
              }


              else {

              

              $sql = "INSERT INTO new_account_requests (email, password,name,phone,dob,address,wallet,receiver_number,tx_id,sponsor_email,leg)
              values ('$new_email','$password','$username','$phone_number','$dob','$address','$wallet','$rec_number','$tx_id','$sponsor_email','$leg')";
              $conn->query($sql);



              $targetDir = 'uploads/'.$new_email;

              $fileName = basename($_FILES["file"]["name"]);
              $targetFilePath = $targetDir . $fileName;
              $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
              $statusMsg = '';




              if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        // Insert image file name into database
                        $insert = $conn->query("UPDATE new_account_requests SET br='".$new_email.$fileName."' WHERE email='$new_email'");
                        if($insert){
                            //$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                            //$sql = "UPDATE new_account_requests SET profile_pic='1' WHERE email='$new_email'";
                            //$run_sql = mysqli_query($conn, $sql);


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




              $key=1;

              if ($key == 1)
              {
                header("Location: Refer.php?v=1");
                
              }

              else
              {

                echo "Contact to Admin";
              }

            }

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





