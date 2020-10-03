
<html>

<form action='q2.php' method='POST'>
   <p>Enter name of student and updated marks to make changes to database </p>
   <label>Name:</label>
   <input type='text' name='studentname'><br>
   <label>Enter marks</label><br>
   <label>Subject 1:</label>
   <input type='number' name='s1' min=0 max='100'> /100<br>
   <label>Subject 2:</label>
   <input type='number' name='s2' min=0 max='100'> /100<br>
   <label>Subject 3:</label>
   <input type='number' name='s3' min=0 max='100'> /100<br>
   <label>Subject 4:</label>
   <input type='number' name='s4' min=0 max='100'> /100<br>
   <label>Subject 5:</label>
   <input type='number' name='s5' min=0 max='100'> /100<br>
   <input type='submit' name='update' value='update'><br>

</form>

</html>

<?php

require("connect1.php");

if(isset($_POST['update']))
{
   $name=$_POST['studentname'];
   $sub1=$_POST['s1'];
   $sub2=$_POST['s2'];
   $sub3=$_POST['s3'];
   $sub4=$_POST['s4'];
   $sub5=$_POST['s5'];
   $outof=100;

   function calc($sub1,$sub2,$sub3,$sub4,$sub5)
   {
      $sum=$sub1+$sub2+$sub3+$sub4+$sub5;
      return $sum;
   }

   $totalobtained=calc($sub1,$sub2,$sub3,$sub4,$sub5);
   $totalmarks=($outof*5);
   $percentage=((calc($sub1,$sub2,$sub3,$sub4,$sub5)/($outof*5))*100);  

      
      //Update values
      $result=mysqli_query($conn, "UPDATE class1 SET sub1='$sub1', sub2='$sub2', sub3='$sub3',sub4='$sub4', sub5='$sub5', totalobtained='$totalobtained', totalmarks='$totalmarks', percentage='$percentage' WHERE name='$name'");

      if($result){
         echo "successfully updated<br>";
      }
      else{
         echo "not updated<br>";   
      }
   
      //SQL query to retrieve data
      $sql="SELECT id, name, sub1, sub2, sub3, sub4, sub5, totalobtained, totalmarks, percentage FROM class1 ";
      //Execute sql query
      $display=mysqli_query($conn,$sql);

      echo "<table border=1>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Subject1</th>
               <th>Subject2</th>
               <th>Subject3</th>
               <th>Subject4</th>
               <th>Subject5</th>
               <th>Total Marks Obtained</th>
               <th>Total Marks </th>
               <th>Percentage</th>
      ";

      //Check number of rows in display and print data
      if(mysqli_num_rows($display)>0){

         //Fetch display as array & display each row
         while($row=mysqli_fetch_array($display)){
            echo"<tr>";
            echo"<td>".$row['id']."</td>";
            echo"<td>".$row['name']."</td>";
            echo"<td>".$row['sub1']."</td>";
            echo"<td>".$row['sub2']."</td>";
            echo"<td>".$row['sub3']."</td>";
            echo"<td>".$row['sub4']."</td>";
            echo"<td>".$row['sub5']."</td>";
            echo"<td>".$row['totalobtained']."</td>";
            echo"<td>".$row['totalmarks']."</td>";
            echo"<td>".$row['percentage']."</td>";
            echo"</tr>";
         }
      }
      else{
         echo "0 results";
      }
      echo "</table>";
      mysqli_close($conn);
   }



?>

