
<?php 
session_start();

include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
     <h1> <?php echo $_SESSION['user_name']; ?> اهلا </h1>
    <!-- <a href="home.php">الصفحة الرئيسة</a> -->
	 
	 <form action="comment.php" method="post">
	 <button type="submit"  name="show" >عرض التعليق</button><br><br><br><br> 
      الرقم التدريبي :<input type="text"  name="id2" placeholder ="الرقم التدريبي" >
   <button type="submit"  name="delete" onclick="delete1()">حذف التعليق</button><br><br> 
	 
	  <!-- <input type="text"  name="id" > -->  
	 

	 <!--<button type="submit"  name="add" onclick="add()">إضافة التعليق</button>-->
	 
	 
	الرقم التدريبي:<input type="text"  name="id" placeholder ="الرقم التدريبي" ><br>  
 اسم المستخدم: <input type="text"  name="comment" placeholder ="التعليق" ><br>
  التعليق:<button type="submit"  name="add" onclick="add()">إضافة التعليق</button><a href="home.php">الصفحة الرئيسة</a>
	 
	 
	 
	 
	 <!--<button type="submit" name ="modefy" onclick="modefy()">التعديل على البيانات</button>
	  
	  <div id="myDIV2"> 
<input type="text"  name="id1" placeholder="رقم المستخدم" ><br><br>   
<input type="text"  name="name1" placeholder="إسم المستخدم" ><br><br>   
<input type="text"  name="pass" placeholder="كلمة المرور" ><br><br>  -->
	 </div>
	   </form>
	 

	  
</body>
</html>

<?php 
}

else{
     header("Location: index.php");
     exit();
}
 ?>
 <?php
 //إنشاء الاتصال
 $conn=new mysqil ($sname,$uname,$password,$db_name);
 //الاستعلام 
 $sql="SELECT users.user_name, comments.comment FROM users INNER JOIN comments ON users.common_column = comments.common_column";
 $result = $conn->query($sql);
  //$show = "SELECT * from users INNER JOIN comment on users.id=comments.comment";SELECT * from users. INNER JOIN users on comments.comment=users.id'
if(isset($_POST['show'])){   
 $query = 'SELECT * from comments'; 
 
 $result = mysqli_query($conn,$query);   

 if ($result){   
 //echo ' تم البحث بنجاح';  
 //if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}
 //echo '<table border ="1">  <th>id</th>  <th>commnt</th> ';   
 while ($row =mysqli_fetch_row($result)){   
 ECHO '<br><br><h5><tr> <html><div style="width: 800px; float: left; height: 80px; background-color: #f1f1f1; padding: 10px;">
 <p><td>'.$row[1]."<br>".'</td></p> <td>'.$row[2].'</td> </div> </body> </html></tr></h5>';
 //  <td>'.$row[0].'</td>   
 }   
 }  
  else{   
      
   die('error'.mysqli_error($conn));   
  }    
 }   
   
   
  
  //delete   
if(isset($_POST['delete'])){   
  $username= $_POST['id2'];   
  $query="delete from comments where id= '$username'"; 
 $result = mysqli_query ($conn,$query);   
 if ($result){   
  echo "تم الحذف"; 
//}else {die('error');   
 } 
}



//insert   
if(isset($_POST['add'])){   
     
     $username= $_POST['id']; 
      $ur=$_POST['urn']; 
     $passwordu= $_POST['comment'];     
    
$query="INSERT INTO comments (id,user_c, comment)
         VALUES ('$username','$ur','$passwordu')";
 $result = mysqli_query ($conn,$query);   
 if ($result){   
  echo "تمت اضافة التعليق";   
}else {die('error');   
 }   }    



//update   
if(isset($_POST['modefy'])){   
       $id= $_POST['id1'];   
     $username1= $_POST['comment'];   
 //$passwordu= $_POST['pass'];   
  
    
  $query="update users set user_name = '$username1' where id= '$id'";   
 $result = mysqli_query ($conn,$query);   
 if ($result){   
  echo "updated done";   
  //,password= '$passwordu'
}else {die('error');   
 }   
}    

 ?>