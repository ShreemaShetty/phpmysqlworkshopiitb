<?php
require ("connect.php");
$success=null; 
$error=null;
$id=(isset($_POST['id']) ? $_POST['id'] : null );
$name=(isset($_POST['name']) ? $_POST['name'] : null );
$email=(isset($_POST['email']) ? $_POST['email'] : null );
$password=(isset($_POST['password']) ? $_POST['password'] : null );
$password2=(isset($_POST['password2']) ? $_POST['password2'] : null );
if(isset($_POST['submit'])){
 
    if(!empty($id && $name && $password && $email && $password2)){

        $compare = "SELECT * FROM student";
        $result = mysqli_query($conn, $compare);
        if (mysqli_num_rows($result) > 0) {
            
            while($row = mysqli_fetch_assoc($result)) {
                $stored_id=$row["id"];
                if($stored_id === $id){
                    die ("Student with id exists");   
                } 
                $stored_email=$row["email"];
                if($stored_email === $email){
                    die ("User already exists");
                    
                }               
            }                          
        }
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                if($password === $password2){
                    $password=md5($password);
                    $sql="INSERT into student (id,name,password,email) VALUES('$id','$name','$password','$email');";
                    $sql .= "INSERT INTO marks (student_id) VALUES ('$id')";
                    
                    if (mysqli_multi_query($conn, $sql)) {
                        do {
                            
                            if ($result = mysqli_store_result($conn)) {
                                while ($row = mysqli_fetch_row($result)) {
                                    
                                }
                                mysqli_free_result($result);
                            }
                            
                            if (mysqli_more_results($conn)) {
                                echo "<script type='text/javascript'>alert('New user Added');
                                window.location='login.php';
                                </script>";
                            }
                        } while (mysqli_next_result($conn));
                    } 
                    else {
                        echo "Error: " . $sql . ":-" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    
                }
                else $error="Passwords Don't match";
            }
            else $error="Please enter a valid email";           
    }
    else  $error="Input Values";
           
    }
    


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>form{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    input{
        margin: 5px;
        }
    #submit{
        margin: 0 auto;
    }    
        </style>
</head>

<body>
    <h1 style="text-align: center;">Registration Form</h1>
        <form action="" method="post">
        Roll no <input type="number" name="id" value="<?php echo $id?>"required>
        <br>
        Username <input type="text" name="name" value="<?php echo $name?>"required>
        <br>
        Email <input type="email" name="email" value="<?php echo $email ?>" required>
        <br>
        Password <input type="password" name="password" value="<?php echo $password ?>" required>
        <br>
        ConfirmPassword <input type="password" name="password2" value="<?php echo $password2 ?>" required>
        <br>
        <input type="submit" name="submit" id="submit">
        </form>
      <h3 style="text-align: center;"><?php echo $success; echo $error; ?></h3>  
            
</body>
</html>