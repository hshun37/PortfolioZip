<?php
//session_start();
include "../config/db.php";

$user_id = $_POST["user_id"];
$user_pass= $_POST["user_pass"];

$query = "select * from member where user_id='$user_id' and user_pass='$user_pass'";
//echo $query;

$result = mysqli_query($db, $query); // SQL문 실행

$row = mysqli_fetch_array($result); // 실행된 결과 값의 각 필드

if($user_id==$row['user_id'] && $user_pass==$row['user_pass']){

	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['user_name'] = $row['user_name'];
	$_SESSION['user_school']=$row['user_school'];
	$_SESSION['user_member']=$row['user_member'];
	$_SESSION['user_email']=$row['user_email'];

	echo "<script>
	alert('로그인 되었습니다.');
	location.href='../index.html';
	</script>";

} else{
	echo "<script>
	alert('아이디 혹은 비밀번호를 확인하세요.');
	location.href='login.php';
	</script>";
}

?>