<?php 
//注册处理界面 regcheck.php
 if(isset($_POST["submit"]) && $_POST["submit"] == "立即注册") 
 { 
    $number = $_POST["number"]; 
    $user = $_POST["username"]; 
    $psw = $_POST["password"]; 
    $psw_confirm = $_POST["repassword"];
 if($number == "" || $user == "" || $psw == "" || $psw_confirm == "") 
 { 
     echo "信息不能为空";
 } 
 else 
 { 
    if($psw == $psw_confirm) 
    { 
        $conn = mysqli_connect("localhost","root","5d35fbc9c39d15f5"); //连接数据库,帐号密码为自己数据库的帐号密码 
        if(mysqli_errno($conn)){
        echo mysqli_error($conn);
        exit;
    }
    mysqli_select_db($conn,"test"); //选择数据库 
    mysqli_set_charset($conn,'utf8'); //设定字符集 
    $sql = "select username from user where username = '$user'"; //SQL语句
    $result = mysqli_query($conn,$sql); //执行SQL语句 
    if (!$result) {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
    }
    $num = mysqli_num_rows($result); //统计执行结果影响的行数 

    if($num) //如果已经存在该用户 
    { 
        echo "<script>alert('用户名已存在'); history.go(-1);</script>"; 
    } 
    else //不存在当前注册用户名称 
    { 
    $sql_insert = "insert into `user` (`number`,`username`,`userpwd`) values('" . $number . "','" . $user ."','" . $psw ."')"; 
    $res_insert = mysqli_query($conn,$sql_insert); 
    //$num_insert = mysql_num_rows($res_insert); 
    if($res_insert) 
    { 
    echo "<script>alert('成功注册'); window.location.href='../index.html';</script>"; 
    } 
    else 
    { 
    echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>"; 
    } 
    } 
    } 
    else 
    { 
        echo "<script>alert('密码不一致！'); history.go(-1);</script>"; 
    } 
    } 
} 
else 
{ 
    echo "<script>alert('提交未成功！');</script>"; 
} 
?> 