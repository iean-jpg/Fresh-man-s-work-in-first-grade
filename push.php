<?php
 $conn = mysqli_connect("localhost","root","5d35fbc9c39d15f5"); //连接数据库,帐号密码为自己数据库的帐号密码 
 if(mysqli_errno($conn)){
 echo mysqli_error($conn);
 exit;
 }
 mysqli_select_db($conn,"test"); //选择数据库 
 mysqli_set_charset($conn,'utf8'); //设定字符集 

//接收数据
$temper = $_POST['temper'];
$health = $_POST['health'];
$condition = $_POST['condition'];
$state = $_POST['state'];
$place = $_POST['place'];
$check = $_POST['check'];
//检验数据

if($temper == '' || $health == '' || $condition == '' || $state == '' || $place == '' || $check == ''){
    echo "<script>alert('信息不能为空');window.location.href='check.html'</script>";
}else{
    //插入数据库
    $sql_insert = "insert into `info` (`temper`,`health`,`condition`,`state`,`place`,`check`) values('" . $temper . "','" . $health ."','" . $condition . "','" . $state ."','" . $place . "','".$check."')";
    if(mysqli_query($conn,$sql_insert)){
        echo "<script>alert('提交成功');window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('提交失败');window.location.href='check.html'</script>";
    }
}