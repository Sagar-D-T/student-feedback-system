<?php
session_start();
if (isset($_POST['modify'])){
$u=$_SESSION['admin'];
$p1=$_POST['password1'];
$p2=$_POST['password2'];
if (strcmp(p1,p2)!=0){
echo "<h3>Error</h3><p>Password does not match</p>"
echo "<a href= 'password.html'>Try again</a>";
}
else{
$con=mysqli_connect("localhost","root","","admin");
if (mysqli_connect_error()){
echo "<h3>Connection Error</h3><p>Can not connect</p>";
exit();
}
$query="update admin set password='$p1' where username='$u'";
if (mysqli_query($con,$query)){
echo "<h3>Successful</h3><p>password modification completed</p>";
echo "<a href= 'home.html'>Hpme page</a>";
}
else {
echo "<h3>Error</h3><p>can not modify password</p>";
echo "<a href= 'password.html'>Try again</a>";
}
mysqli_close($con);
}
}
?>