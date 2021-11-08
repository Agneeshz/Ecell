<?php
   $server = "localhost";
   $user="root";
   $password="";
   $db="emailveri";
   $con=mysqli_connect($server,$user,$password,$db);
   if($con){
       ?>
            <script>
                alert("Connection Successful");
            </script>
        <?php
   }else{
    ?>
    <script>
        alert("Not Successful");
    </script>
<?php
   }
?>