

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>부서 정보</title>
</head>
<body>
  <?php
      $con=mysqli_connect("localhost", "root", "1234", "as_db") or die("MySQL 접속 실패");

      $sql = "SELECT * FROM info";

      $ret = mysqli_query($con, $sql);
      if($ret) { 
        $count = mysqli_num_rows($ret);
      }
      else {
        echo "데이터 조회 실패". "<br>";
        echo "실패 원인 :".mysqli_error($con);
        exit();
      }
      echo "<h1> 부서 정보 </h1>";
      echo "<TABLE>";
        echo "<TR>";
          echo "<TH>부서명</TH><TH>수업요일</TH><TH>강사료</TH><TH>수업차시</TH><TH>차시별<br>강사료</TH><TH>재료비</TH>";
        echo "</TR>";
      while($row = mysqli_fetch_array($ret)) {
        echo "<TR>";
          echo "<TD>", $row['program'], "</TD>";
          echo "<TD>", $row['day'], "</TD>";
          echo "<TD>", $row['fee'], "</TD>";
          echo "<TD>", $row['classTime'], "</TD>";
        echo "</TR>";
      }
      echo "</TABLE>";
      mysqli_close($con);
  ?>
</body>
</html>