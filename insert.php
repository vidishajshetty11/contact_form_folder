<?php 
error_reporting(E_ERROR|E_PARSE);

if($_SERVER['REQUEST_METHOD'] == "POST"){
$db_name="contact_form_db";
$host="localhost";
$password="";
$username="root";

try{
$link=new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){

    echo "connection failed:" .$e->getMessage();

}


$full_name=$_POST['full_name'];
$phone_number=$_POST['phone_number'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$ip_address=$_SERVER['REMOTE_ADDR'];
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip_address.='(Proxy:'.$_server['HTTP_X_FORWARDED_FOR'].')';
}

$check_user=$link->prepare("SELECT * FROM contact_form WHERE `email`='".$email."' AND `phone_number`=$phone_number AND `full_name`='".$full_name."'");
$check_user->execute();
if($check_user->rowCount()== 0){
$query=$link->prepare("INSERT INTO `contact_form` (`full_name`,`phone_number`,`email`,`subject`,`message`,`ip_address`) VALUES ('".$full_name."',$phone_number,'".$email."','".$subject."','".$message."','".$ip_address."')");
$query->execute();
}

if($query){
    echo "data inserted successfully";
}else{
   echo "data exist already";
}
}
?>