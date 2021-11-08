
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
    <?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $username=mysqli_real_escape_string($con, $_POST['username']);
        $email=mysqli_real_escape_string($con, $_POST['email']);
        $password=mysqli_real_escape_string($con, $_POST['password']);
        $cpassword=mysqli_real_escape_string($con, $_POST['cpassword']);

        $pass=password_hash($password, PASSWORD_BCRYPT);
        $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

        $emailquery="select * from registration where email='$email' ";
        $query=mysqli_query($con,$emailquery);
        $emailcount = mysqli_num_rows($query);
        if($emailcount>0){
           echo "email already exists";
        }else{
           if($password===$cpassword){
              $insertquery = "insert into registration(username, email, password, cpassword) values('$username', '$email', '$pass', '$cpass')";
              $iquery = mysqli_querry($con, $insertquery);
               if($iquery){
                  ?>
            <script>
                alert("Insertion Successful");
            </script>
        <?php
   }else{
    ?>
    <script>
        alert("Not Successful");
    </script>
<?php
               }
           }else{
              echo "password are not matching";
           }
        }
    }
    ?>
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box" text="required"/><br /><br />
                  <label>Email  :</label><input type = "email" name = "email" class = "box" text="required"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" text="required" /><br /><br />
                  <label>Confirm Password  :</label><input type = "cpassword" name = "cpassword" class = "box" text="required" /><br /><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>
	
      


   </body>
</html>