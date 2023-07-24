<?php
$name=$_POST['Username'];
$add=$_POST["Address"];
$c=$_POST["count"];
$amt=$_POST["amount"];
$method=$_POST["Payment"];
$con=new mysqli("localhost","root","","test");
if($con->connect_error){
    echo "$con->connect_error";
}
else{
    $stmt=$con->prepare("insert into User(names,adr,cn,amt,method)values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$name,$add,$c,$amt,$method);
    $exe=$stmt->execute();
    echo "Registration successfully";
    $stmt->close();
    $con->close();
}
?>