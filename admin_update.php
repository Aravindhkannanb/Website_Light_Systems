<html>
    <head>
        <link rel="stylesheet" href="admin_update.css">
</head>
<body>

    <?php 
    $id=$_GET['edit'];
    ?>
    <?php 
    $conn=mysqli_connect("localhost","root","","test");
    ?>
   
    <?php
    if(isset($_POST["submitted"])){
        $name=$_POST['name'];
        $price=$_POST['price'];
        $image=$_FILES['image']['name'];
        $image_temp=$_FILES['image']['tmp_name'];
        $image_upload="uploaded_image/".$image;
        $update="update product set productname='$name',price='$price',image='$image' where id='$id'";
        $upload=mysqli_query($conn,$update);
        if($upload){
            move_uploaded_file($image_temp,$image_upload);
            header('location:admin.php');
        }
        }
    ?>
     <?php
    $fetch="select * from product where id=$id";
    $result=mysqli_query($conn,$fetch);
    while($row=mysqli_fetch_assoc($result)){
    ?>
    
    <section class="wrap">
        <div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="input">
    <input type="text" value=<?php echo $row["productname"]?> name="name" >
    </div>
    <div class="input">
    <input type="text" value=<?php echo $row["price"]?> name="price">
    </div>
    <div class="input">
    <input type="file" name="image">
    </div>
    <div class="input button">
    <input type="submit" value="update" name="submitted">
    </div>
    <div class="input button">
    <a href="admin.php">go back</a>
    </div>
    </div>
</form>
    </section>
<?php }?>
</form>
</body>
</html>