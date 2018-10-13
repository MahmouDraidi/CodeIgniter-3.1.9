<?php
/**
 * Created by PhpStorm.
 * User: smilecom
 * Date: 2018-10-13
 * Time: 10:41 AM
 */
$conn=new mysqli('localhost',"root",'','test');
$sql="select * from blogs ";
//if($sql)echo "well connected";
$result = $conn->query($sql);
echo '<table style="width: 100%"><tr></tr><td>ID</td><td>Title</td><td>Body</td>';

for($i=0;$i<$result->num_rows;$i++){

    $row = $result->fetch_assoc();
echo "<tr><td>". $row['id']."</td>"."<td>".$row['title']."</td>"."<td>".$row['body']."</td></tr>" ;
}

if(isset($_POST["add"])){
    $conn=new mysqli('localhost',"root",'','test');
    $sql="insert into blogs values('','" .$_POST['title']. "','" .$_POST['body']."')";
    //echo $sql;
    $result=$conn->query($sql);
    echo "Insertion done";
}
if(isset($_POST["delete"])){
    $conn=new mysqli('localhost',"root",'','test');
    $sql="delete from blogs where id=".$_POST["delettionID"];
    //echo $sql;
    $result=$conn->query($sql);
    echo "Deleted ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Krakeeb</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="connectBlogs.php" method="post">
<div>
    <div id="add">
        <input type="text" placeholder="Title" name="title">
        <input type="text" placeholder="Body" name="body">
        <input  type="submit" value="Add" name="add">

    </div>
    <div id="delete">
        <input type="text" placeholder="Enter ID" name="delettionID">
        <input  type="submit" value="Delete" name="delete">

    </div>
    <div id="update"></div>
</div>
</form>
</body>
</html>