<?php
  $con=mysqli_connect("localhost", "root", "1234", "as_db") or die("MySQL 접속 실패");

  $studentNo = $_POST["studentNo"];

  $sql = "DELETE FROM refundTBL_1 WHERE studentNo='".$studentNo."'";

  $ret = mysqli_query($con, $sql);
  if($ret) {
    echo "데이터가 성공적으로 삭제됨";
  }
  else {
    echo "데이터 삭제 실패<br>";
    echo "실패 원인:".mysqli_error($con);
  }
  mysqli_close($con);

  echo "<br><br><a href='main.php'>환불 초기 화면으로 돌아가기</a>";
?>