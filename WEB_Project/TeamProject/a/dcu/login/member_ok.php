<?php
include "../config/db.php";

$user_id = $_POST['user_id'];
$user_pass = $_POST['user_pass'];
$user_name = $_POST['user_name'];
$user_phone = $_POST['user_phone'];
$user_email = $_POST['user_email'];
$user_post = $_POST['user_post'];
$user_address1 = $_POST['user_address1'];
$user_address2 = $_POST['user_address2'];

$user_school = $_POST['user_school'];
$user_member = $_POST['user_member'];
$user_wdate = date('Y-m-d');

//회원중복처리
$sql1="select *from member where user_id='".$user_id."'";
$result1 = mysqli_query($db, $sql1);
$row = mysqli_fetch_array($result1);

if($row==0){

$sql = "insert into member (user_id,user_pass,user_name,user_member,user_school,user_wdate,user_phone,user_email,user_post,user_address1,user_address2) values ('".$user_id."','".$user_pass."','".$user_name."','".$user_member."','".$user_school."','".$user_wdate."','".$user_phone."','".$user_email."','".$user_post."','".$user_address1."','".$user_address2."')";

$result =mysqli_query($db, $sql);

?>

<script>
alert("회원가입이 완료되었습니다./n로그인 하시기 바랍니다.");
location.href="../index.html";
</script>

<?php
} else {
?>

<script>
alert("중복된 아이디가 있습니다./n다시 입력하세요.");
history.back();
</script>
<?php
}
?>






