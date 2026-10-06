<?php
session_start();
if (isset($_POST['login']))
{
$u=$_POST['username'];
$p=$_POST['password'];
$con=mysqli_connect("localhost","root","","admin");
if(mysqli_connect_errno()){
echo "<h3>Connection error</h3>";
echo "<p>Can not connect to database server. Try again.</p>";
echo "<a href='login.php'>Click here to login</a>";
exit();
}
$query="select * from admin where username='$u'and password='$p'";
$result=mysqli_query($con,$query);
$count=mysqli_num_rows($result);
if($count==1){
//username password combination is correct
$_SESSION['admin']=$u;
header('location:home.php');
}
else{
//provided username password combination does not exists
echo "<h3>login Error"</h3>";
echo "<p> username password combination incorrect.Try again.</p>";
echo "<a href='login.php'>Click here to login</a>"; 
}
mysql_close($con);
}
?>
