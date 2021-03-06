<!DOCTYPE html>
<html lang="ko">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">asd
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <!--초기화 css-->
  <link rel="stylesheet" href="../css/common.css">
  
  <!--레이아웃 관련 css-->
  <link rel="stylesheet" href="../css/layout.css">
  <script>
  function checkid(){
	var user_id = document.getElementById("user_id").value;
	//name 값보다 id값을 가져간다.
	if(user_id) {
		url = "check.php?user_id="+user_id;
			window.open(url,"chkid","width=300,height=100");
	} else {
		alert("아이디를 입력하세요");
	}
  }
  </script>

 </head>
 <body>
  <div id="wrap">
	<?php
	include "../inc/header.html";
	?>
	<div class="content">
		<h2>회원가입</h2>
		<div id="section">
			<form method="post" action="member_ok.php" name="frm">
			<!--  
			<파일첨부>
			<form method="post" action="member_ok.php" name="frm" enctype="multipart/form-data">
			-->

			<input type="hidden" name="user_school" value="대구가톨릭대학교">
			<input type="hidden" name="user_member" value="학생">
			
				<div class="member_wrap">
					<table>
						<tr>
							<td>ID</td>
							<td>
							<input type="text" name="user_id" id="user_id">
							<input type="button" value="중복검사" onclick="checkid();">
							</td>
						</tr>
						
						<tr>
							<td>password</td>
							<td><input type="password" name="user_pass"></td>
						</tr>

						<tr>
							<td>이름</td>
							<td><input type="text" name="user_name"></td>
						</tr>

						<tr>
							<td>휴대폰</td>
							<td><input type="text" name="user_phone"></td>
						</tr>

						<tr>
							<td>email</td>
							<td><input type="text" name="user_email"></td>
						</tr>

						<!--도로명주소 API-->
						<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
						<script>
    //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
    function execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var roadAddr = data.roadAddress; // 도로명 주소 변수
                var extraRoadAddr = ''; // 참고 항목 변수

                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraRoadAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if(data.buildingName !== '' && data.apartment === 'Y'){
                   extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if(extraRoadAddr !== ''){
                    extraRoadAddr = ' (' + extraRoadAddr + ')';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('user_post').value = data.zonecode;
                document.getElementById("roadAddress").value = roadAddr;
                document.getElementById("jibunAddress").value = data.jibunAddress;
                
                // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
                if(roadAddr !== ''){
                    document.getElementById("extraAddress").value = extraRoadAddr;
                } else {
                    document.getElementById("extraAddress").value = '';
                }

                var guideTextBox = document.getElementById("guide");
                // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
                if(data.autoRoadAddress) {
                    var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                    guideTextBox.innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';
                    guideTextBox.style.display = 'block';

                } else if(data.autoJibunAddress) {
                    var expJibunAddr = data.autoJibunAddress;
                    guideTextBox.innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';
                    guideTextBox.style.display = 'block';
                } else {
                    guideTextBox.innerHTML = '';
                    guideTextBox.style.display = 'none';
                }
            }
        }).open();
    }
</script>
						<tr>
							<td>주소</td>
							<td>
							<input type="text" name="user_post" placeholder="우편번호" id="user_post">
							<input type="button" onclick="execDaumPostcode()" value="우편번호 찾기"><br>
							<input type="text" name="user_address1" placeholder="도로명주소" id="roadAddress">
							<br>
							<input type="hidden" name="user_address3" id="jibunAddress">
							<br>
							<input type="text" name="user_address2" placeholder="나머지주소" id="detailAddress">
							<br>
							<input type="hidden" name="user_address4"
							placeholder="참고사항" id="extraAddress">
							</td>
						</tr>

						<tr>
							<td colspan="2"><input type="submit" value="회원가입"></td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
  </div>
 </body>
</html>





