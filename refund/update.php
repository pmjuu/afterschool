<?php
  $con=mysqli_connect("localhost", "root", "1234", "as_db") or die("MySQL 접속 실패");

  $sql = "SELECT * FROM refundTBL_1 WHERE studentNo='".$_GET['studentNo']."'";

  $ret = mysqli_query($con, $sql);
  if($ret) {
    $count = mysqli_num_rows($ret);
    if ($count == 0) {
      echo $_GET['studentNo']." 해당 학생이 없음"."<br>";
      echo "<br> <a href='main.php'> 환불 관리 초기 화면으로 돌아가기 </a>";
      exit();
    }
  }
  else {
    echo "데이터 조회 실패<br>";
    echo "실패 원인:".mysqli_error($con);
    echo "<br> <a href='main.php'> 환불 관리 초기 화면으로 돌아가기 </a>";
    exit();
  }

  $row = mysqli_fetch_array($ret);

  $studentNo = $row['studentNo'];
  $grade = $row['grade'];
  $class = $row['class'];
  $number = $row['number'];
  $name = $row['name'];
  $program = $row['program'];
  $fee1 = $row['fee1'];
  $fee2 = $row['fee2'];
  $classTime = $row['classTime'];
  $mcost = $row['mcost'];
  $total = $row['total'];
  $startDate = $row['startDate'];
  $memo = " ";
  $memo = $row['memo'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>환불 학생 수정</title>
</head>
<body>
  <h1>환불 학생 수정</h1>
  <form method="post" action="update_result.php">
    <ul>
      <li>
        No. <input type="text" name="studentNo" value=<?php echo $studentNo ?> size="3" readonly>
      </li>
      <li>
        <label for="grade">학년</label>
        <input type="text" name="grade" value=<?php echo $grade ?> size="3">
        <label for="class">반</label>
        <input type="text" name="class" value=<?php echo $class ?> size="3">
        <label for="number">번호</label>
        <input type="text" name="number" value=<?php echo $number ?> size="3">
      </li>
      <li>
        <label for="name">이름</label>
        <input type="text" name="name" value=<?php echo $name ?> size="6">
      </li>
      <li>
        <label for="program">부서명</label>
        <select name="program" value=<?php echo $program ?>>
          <?php
            $programList = array("독서논술토론", "창의미술", "비즈토탈공예", "컴퓨터", "수학", "영어회화", "피아노", "바이올린", "로봇과학", "음악줄넘기", "요리", "창의실험과학", "농구", "방송댄스", "바둑체스", "축구", "창의생명과학");
            foreach($programList as $i) {
              if($i == $program) {
                echo "<option value='", $i, "'selected>", $i, "</option>";
              }
              else {
                echo "<option value='", $i, "'>", $i, "</option>";
              }
            }
          ?>
        </select>
      </li>
      <li>
        <label for="classTime">환불차시</label>
        <input type="text" name="classTime" value=<?php echo $classTime ?> size="4">
      </li>
      <li>
        <label for="mcost">재료비</label>
        <input type="text" name="mcost" value=<?php echo $mcost ?> size="6">
      </li>
      <li>
        <label for="startDate">환불 시작일</label>
        <input type="date" name="startDate" value=<?php echo $startDate ?>>
      </li>
      <li>
        <label for="memo">비고</label>
        <input type="text" name="memo" value=<?php echo $memo ?> size="40">
      </li>
    </ul>
    <input type="submit" value="정보 수정">
  </form>
</body>
</html>