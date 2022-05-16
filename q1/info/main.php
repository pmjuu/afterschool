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

?>