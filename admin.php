<?php
$conn=mysqli_connect("localhost","root","","test");
if(isset($_POST['submitted'])){
    $name=$_POST['productname'];
    $price=$_POST['price'];
    $image=$_FILES['image']['name'];
    $image_temp=$_FILES['image']['tmp_name'];
    $image_upload="uploaded_image/".$image;
    $insert="insert into product(productname,price,image)values('$name','$price','$image')";
    $upload=mysqli_query($conn,$insert);
    if($upload){
        move_uploaded_file($image_temp,$image_upload);
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="admin.css">
</head>
<?php 
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="delete from product where id=$id";
    mysqli_query($conn,$delete);
    header("location:admin.php");
}
?>
<body>
    <section class="wrap">
    <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
    <div class="input">
        <input type="text" placeholder="Enter name of product" name="productname">
</div>
<div class="input">
        <input type="text" placeholder="Enter price" name="price">
</div>
<div class="input">
        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" >
</div>
<div class="input button">
        <input type="submit" name="submitted">
</div>
</form>
</section>
<wbr>

<table class="styled-table">
    <thead>
    <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price </th>
        <th>Action</th>
</tr>
</thead>
    <?php 
    $select="select * from product";
    $result=mysqli_query($conn,$select);
    ?>
    <?php while($row=mysqli_fetch_assoc($result)) {?>
        <tbody>
        <tr>
        <td><img src="uploaded_image/<?php echo $row['image']?>" height="100"></td>
        <td><?php echo $row['productname']?></td>
        <td><?php echo $row['price']?></td>
        <td><button class="button-1"><a style="text-decoration:none;color:white" href="admin.php?delete=<?php echo $row['id'];?>">Delete</a></button>
    <button class="button-2"><a style="text-decoration:none;color:white" href="admin_update.php?edit=<?php echo $row['id']?>">Update</a></button></td>
    </tr>
    </tbody>
    <?php }?>
</body>
    </html>
