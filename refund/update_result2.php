<?php
  $con=mysqli_connect("localhost", "root", "1234", "as_db") or die("MySQL 접속 실패");

  $studentNo = $_POST["studentNo"];
  $grade = $_POST["grade"];
  $class = $_POST["class"];
  $number = $_POST["number"];
  $name = $_POST["name"];
  $program = $_POST["program"];

  $programList = array("독서논술토론", "창의미술", "비즈토탈공예", "컴퓨터", "수학", "영어회화", "피아노", "바이올린", "로봇과학", "음악줄넘기", "요리", "창의실험과학", "농구", "방송댄스", "바둑체스", "축구", "창의생명과학");
  $fee1List = array(
    3750,
    3800,
    3750,
    3125,
    3750,
    3750,
    3800,
    3750,
    3125,
    3750,
    3500,
    3750,
    3750,
    3750,
    3750,
    3750,
    3125);
  
  for ($i = 0; $i < count($programList); $i++)
    if ($program == $programList[$i])
      $fee1 = $fee1List[$i];

  $fee2 = 150; //1분기 수용비는 150원으로 고정

  $classTime = $_POST["classTime"];
  $mcost = $_POST["mcost"];
  $total = ($fee1 + $fee2) * $classTime + $mcost;
  $startDate = $_POST["startDate"];
  $memo = $_POST["memo"];

  $sql = "UPDATE refundTBL2_1 SET grade='".$grade."', class='".$class."', number='".$number."', name='".$name."', program='".$program."', fee1='".$fee1."', fee2='".$fee2."', classTime='".$classTime."', mcost='".$mcost."', total='".$total."', startDate='".$startDate."', memo='".$memo."'";
  $sql = $sql."WHERE studentNo='".$studentNo."'";

  $ret = mysqli_query($con, $sql);
  if($ret) {
    echo "데이터가 성공적으로 수정됨";
  }
  else {
    echo "데이터 수정 실패<br>";
    echo "실패 원인:".mysqli_error($con);
  }
  mysqli_close($con);

  echo "<br><br><a href='main.php'>환불 관리 초기 화면으로 돌아가기</a>";
?>