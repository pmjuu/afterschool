<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>환불 학생 입력 및 조회</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <h1>환불 학생 관리</h1>
  <form method="post" action="insert_result.php">
    <fieldset>
      <legend>취소 학생 입력</legend>
      <ul>
        <li>
          <label for="grade">학년</label>
          <input type="text" name="grade" id="grade" size="3">
        </li>
        <li>
          <label for="class">반</label>
          <input type="text" name="class" id="class" size="3">
        </li>
        <li>
          <label for="number">번호</label>
          <input type="text" name="number" id="number" size="3">
        </li>
        <li>
          <label for="name">이름</label>
          <input type="text" name="name" id="name" required size="6">
        </li>
        <li>
          <label for="program">부서명</label>
          <select name="program" id="program">
            <script>
              //부서명 선택하는 드롭다운
              const programList = ["독서논술토론", "창의미술", "비즈토탈공예", "컴퓨터", "수학", "영어회화", "피아노", "바이올린", "로봇과학", "음악줄넘기", "요리", "창의실험과학", "농구", "방송댄스", "바둑체스", "축구", "창의생명과학"];
              for (var i = 0; i < programList.length; i++)
                document.write('<option value="' + programList[i] + '">' + programList[i] + '</option>');
            </script>
          </select>
        </li>
        <li>
          <label for="classTime">환불차시</label>
          <input type="text" name="classTime" id="classTime" size="4">
        </li>
        <li>
          <label for="mcost">재료비</label>
          <input type="text" name="mcost" id="mcost" value=0 size="6">
        </li>
        <li>
          <label for="startDate">환불 시작일</label>
          <input type="date" name="startDate">
        </li>
        <li>
          <label for="memo">비고</label>
          <input type="text" name="memo" id="memo" size="40">
        </li>
      </ul>
    </fieldset>
    <input type="submit" value="입력">
  </form>

  <form method="post" action="insert_result2.php">
    <fieldset>
      <legend>결석 학생 입력</legend>
      <ul>
        <li>
          <label for="grade">학년</label>
          <input type="text" name="grade" id="grade" size="3">
        </li>
        <li>
          <label for="class">반</label>
          <input type="text" name="class" id="class" size="3">
        </li>
        <li>
          <label for="number">번호</label>
          <input type="text" name="number" id="number" size="3">
        </li>
        <li>
          <label for="name">이름</label>
          <input type="text" name="name" id="name" required size="6">
        </li>
        <li>
          <label for="program">부서명</label>
          <select name="program" id="program">
            <script>
              //부서명 선택하는 드롭다운
              const programList = ["독서논술토론", "창의미술", "비즈토탈공예", "컴퓨터", "수학", "영어회화", "피아노", "바이올린", "로봇과학", "음악줄넘기", "요리", "창의실험과학", "농구", "방송댄스", "바둑체스", "축구", "창의생명과학"];
              for (var i = 0; i < programList.length; i++)
                document.write('<option value="' + programList[i] + '">' + programList[i] + '</option>');
            </script>
          </select>
        </li>
        <li>
          <label for="classTime">환불차시</label>
          <input type="text" name="classTime" id="classTime" size="4">
        </li>
        <li>
          <label for="mcost">재료비</label>
          <input type="text" name="mcost" id="mcost" value=0 size="6">
        </li>
        <li>
          <label for="startDate">환불 시작일</label>
          <input type="date" name="startDate">
        </li>
        <li>
          <label for="memo">비고</label>
          <input type="text" name="memo" id="memo" size="40">
        </li>
      </ul>
    </fieldset>
    <input type="submit" value="입력">
  </form>

  <?php
    $con=mysqli_connect("localhost", "root", "1234", "as_db") or die("MySQL 접속 실패");

    $sql = "SELECT * FROM refundTBL_1";

    $ret = mysqli_query($con, $sql);
    if($ret) {
      $count = mysqli_num_rows($ret); //????????
    }
    else {
      echo "취소 학생 데이터 조회 실패". "<br>";
      echo "실패 원인 :".mysqli_error($con);
      exit();
    }

    $programList = array("독서논술토론", "창의미술", "비즈토탈공예", "컴퓨터", "수학", "영어회화", "피아노", "바이올린", "로봇과학", "음악줄넘기", "요리", "창의실험과학", "농구", "방송댄스", "바둑체스", "축구", "창의생명과학");
    echo "<h2> 부서별 취소 학생 수 </h2>";
    echo "<TABLE>";
      echo "<TR>";
        foreach($programList as $i)
          echo "<TH>", $i, "</TH>";
      echo "</TR>";
      echo "<TR>";
        foreach($programList as $i) {
          $sql = "SELECT * FROM refundTBL_1 WHERE program = '$i'";
          $ret2 = mysqli_query($con, $sql);
          $count = mysqli_num_rows($ret2);
          echo "<TD>", $count, "</TD>";
        }
      echo "</TR>";
    echo "</TABLE>";

    echo "<h2> 취소 학생 목록 </h2>";
    echo "*표 상단 헤더를 클릭하면 정렬이 됩니다";
    echo "<TABLE id='refundTBL'>";
      echo "<TR>";
        echo "<TH>No.</TH><TH>학년</TH><TH>반</TH><TH>번호</TH><TH>이름</TH><TH>부서명</TH><TH>차시별<br>강사료</TH><TH>차시별<br>수용비</TH><TH>환불<br>차시</TH><TH>재료비</TH><TH>환불 금액</TH><TH>환불<br>시작일</TH><TH>비고</TH><TH>수정</TH><TH>삭제</TH>";
      echo "</TR>";
    while($row = mysqli_fetch_array($ret)) {
      echo "<TR>";
        echo "<TD>", $row['studentNo'], "</TD>";
        echo "<TD>", $row['grade'], "</TD>";
        echo "<TD>", $row['class'], "</TD>";
        echo "<TD>", $row['number'], "</TD>";
        echo "<TD>", $row['name'], "</TD>";
        echo "<TD>", $row['program'], "</TD>";
        echo "<TD>", $row['fee1'], "</TD>";
        echo "<TD>", $row['fee2'], "</TD>";
        echo "<TD>", $row['classTime'], "</TD>";
        echo "<TD>", $row['mcost'], "</TD>";
        echo "<TD>", $row['total'], "</TD>";
        echo "<TD>", $row['startDate'], "</TD>";
        echo "<TD>", $row['memo'], "</TD>";
        echo "<TD>", "<a href='update.php?studentNo=", $row['studentNo'], "'>수정</a></TD>";
        echo "<TD>", "<a href='delete.php?studentNo=", $row['studentNo'], "'>삭제</a></TD>";
      echo "</TR>";
    }
    echo "</TABLE>";

    $sql = "SELECT * FROM refundTBL2_1";

    $ret = mysqli_query($con, $sql);
    if($ret) {
      $count = mysqli_num_rows($ret);
    }
    else {
      echo "부분 환불 학생 데이터 조회 실패". "<br>";
      echo "실패 원인 :".mysqli_error($con);
      exit();
    }

    echo "<h2> 결석 학생 목록 </h2>";
    echo "*표 상단 헤더를 클릭하면 정렬이 됩니다";
    echo "<TABLE id='refundTBL2'>";
      echo "<TR>";
        echo "<TH>No.</TH><TH>학년</TH><TH>반</TH><TH>번호</TH><TH>이름</TH><TH>부서명</TH><TH>차시별<br>강사료</TH><TH>차시별<br>수용비</TH><TH>환불<br>차시</TH><TH>재료비</TH><TH>환불 금액</TH><TH>환불<br>시작일</TH><TH>비고</TH><TH>수정</TH><TH>삭제</TH>";
      echo "</TR>";
    while($row = mysqli_fetch_array($ret)) {
      echo "<TR>";
        echo "<TD>", $row['studentNo'], "</TD>";
        echo "<TD>", $row['grade'], "</TD>";
        echo "<TD>", $row['class'], "</TD>";
        echo "<TD>", $row['number'], "</TD>";
        echo "<TD>", $row['name'], "</TD>";
        echo "<TD>", $row['program'], "</TD>";
        echo "<TD>", $row['fee1'], "</TD>";
        echo "<TD>", $row['fee2'], "</TD>";
        echo "<TD>", $row['classTime'], "</TD>";
        echo "<TD>", $row['mcost'], "</TD>";
        echo "<TD>", $row['total'], "</TD>";
        echo "<TD>", $row['startDate'], "</TD>";
        echo "<TD>", $row['memo'], "</TD>";
        echo "<TD>", "<a href='update2.php?studentNo=", $row['studentNo'], "'>수정</a></TD>";
        echo "<TD>", "<a href='delete2.php?studentNo=", $row['studentNo'], "'>삭제</a></TD>";
      echo "</TR>";
    }
    
    mysqli_close($con);
    echo "</TABLE>";
  ?>
  <script src="main.js"></script>
</body>
</html>
