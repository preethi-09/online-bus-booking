
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

<?php
$usernameErr = $firstnameErr = $lastnameErr= $emailErr = $phone_noErr=  $passwordErr="";
$username = $firstname = $lastname = $email = $phone_no =   $password="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required!";
  } 
  else 
    {
      $username = get($_POST["username"]);
    }
 
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Firstname is required!";
  } 
  else 
    {
      $firstname = get($_POST["firstname"]);
    }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Lastname is required!";
  } 
  else 
    {
      $lastname= get($_POST["lastname"]);
    }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required!";
  } 
  else 
    {
      $email = get($_POST["email"]);
    }

 
  if (empty($_POST["phone_no"])) {
    $phone_noErr = "Phone No is required!";
  } 
  else 
    {
    $phone_no = get($_POST["phone_no"]);
    }
 
 

    if (empty($_POST["password"])) {
    $passwordErr = "password is required!";
  } 
  else 
    {
      $password = get($_POST["password"]);
    }


/*if (isset($_POST['register'])) {
//echo "registered";
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];
*/
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "images/$image");
    if ($image == "") {
      $image = "user_default.jpg";
    }

if ($username!="" && $firstname!="" && $lastname!="" && $email!="" && $phone_no!="" && $image!="" && $password!="") {



$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_phoneno, user_role, user_image) VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$phone_no', 'subscriber', '$image') ";

$run=mysqli_query($connection,$query); 

    if($run)
    {
     echo ("<script LANGUAGE='JavaScript'>
            window.alert('Welcome to Let\'s go');
            window.location.href='http://localhost/Bus-Booking/index.php';
    </script>");
    }

}
}

function get($form) 
{
  $form = trim($form);
  $form = stripslashes($form);
  $form= htmlspecialchars($form);
  return $form;
}


?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->
     <style>
        .error {color: #FF0000;}
        </style>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="images/bus_regis.png" style="margin-top: 30%;">
            </div>
            <div class="col-lg-6">
                
              
              <h2 style="margin-left: 40%;">Registration</h2>
              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="username">Username<span class="error">*</span></label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Username" name="username"><span class="error"><?php echo $usernameErr;?></span>
                </div>

                <div class="form-group">
                  <label for="firstname">Firstname<span class="error">*</span></label>
                  <input type="text" class="form-control"  placeholder="Enter Firstname" name="firstname"><span class="error"><?php echo $firstnameErr;?></span>
                </div>

                <div class="form-group">
                  <label for="lastname">Lastname<span class="error">*</span></label>
                  <input type="text" class="form-control"  placeholder="Enter Lastname" name="lastname"><span class="error"><?php echo $lastnameErr;?></span>
                </div>

                <div class="form-group">
                    <label for="bus-image">UserImage</label>
                    <input type="file" name="image" >
                   
                </div>

                <div class="form-group">
                  <label for="email">Email<span class="error">*</span></label>
                  <input type="email" class="form-control"  placeholder="Enter email" name="email">
                  <span class="error"><?php echo $emailErr;?></span>
                </div>
                
                <div class="form-group">
                  <label for="phoneno">Phone No<span class="error">*</span></label>
                  <input type="text" class="form-control"  placeholder="Enter phone number" name="phone_no"><span class="error"><?php echo $phone_noErr;?></span>
                </div>

                <div class="form-group">
                  <label for="pwd">Password<span class="error">*</span></label>
                  <input type="password" class="form-control"  placeholder="Enter password" name="password"><span class="error"><?php echo $passwordErr;?></span>
                </div>
        
                <button type="submit" class="btn btn-primary" name="register" style="margin-left: 45%; margin-top: 20px;">Register</button>
              </form>
            

            </div>
        </div>

    </div>
        <hr>

<?php include "includes/footer.php"; ?>