<!DOCTYPE html>
<html>
<head>
도형 면적 구하기
</head>
<body>



<form method="post" action="shape_calculator.php">
  <h2>삼각형</h2>
  <label>밑변: </label>
  <input type="number" name="tri_base"><br>
  <label>높이: </label>
  <input type="number" name="tri_height"><br>
  <input type="submit" value="계산">
  <br>
</form>

<form method="post" action="shape_calculator.php">
  <h2>직사각형</h2>
  <label>가로: </label>
  <input type="number" name="rect_width"><br>
  <label>세로: </label>
  <input type="number" name="rect_height"><br>
  <input type="submit" value="계산">
  <br>
</form>

<form method="post" action="shape_calculator.php">
  <h2>원</h2>
  <label>반지름: </label>
  <input type="number" name="circle_radius"><br>
  <input type="submit" value="계산">
  <br>
</form>

<form method="post" action="shape_calculator.php">
  <h2>직육면체</h2>
  <label>가로: </label>
  <input type="number" name="box_width"><br>
  <label>세로: </label>
  <input type="number" name="box_length"><br>
  <label>높이: </label>
  <input type="number" name="box_height"><br>
  <input type="submit" value="계산">
  <br>
</form>

<form method="post" action="shape_calculator.php">
  <h2>원통</h2>
  <label>반지름: </label>
  <input type="number" name="cylinder_radius"><br>
  <label>높이: </label>
  <input type="number" name="cylinder_height"><br>
  <input type="submit" value="계산">
  <br>
</form>

<form method="post" action="shape_calculator.php">
  <h2>구</h2>
  <label>반지름: </label>
  <input type="number" name="sphere_radius"><br>
  <input type="submit" value="계산">
  <br>
</form>

<?php
// 삼각형 면적 계산
if (isset($_POST['tri_base']) && isset($_POST['tri_height'])) {
  $tri_base = $_POST['tri_base'];
  $tri_height = $_POST['tri_height'];
  $tri_area = 0.5 * $tri_base * $tri_height;
  echo "삼각형 면적: " . $tri_area;
}

// 직사각형 면적 계산
if (isset($_POST['rect_width']) && isset($_POST['rect_height'])) {
  $rect_width = $_POST['rect_width'];
  $rect_height = $_POST['rect_height'];
  $rect_area = $rect_width * $rect_height;
  echo "직사각형 면적: " . $rect_area;
}

// 원 면적 계산
if (isset($_POST['circle_radius'])) {
  $circle_radius = $_POST['circle_radius'];
  $circle_area = pi() * pow($circle_radius, 2);
  echo "원 면적: " . $circle_area;
}

// 직육면체 체적 계산
if (isset($_POST['box_width']) && isset($_POST['box_length']) && isset($_POST['box_height'])) {
  $box_width = $_POST['box_width'];
  $box_length = $_POST['box_length'];
  $box_height = $_POST['box_height'];
  $box_volume = $box_width * $box_length * $box_height;
  echo "직육면체 체적: " . $box_volume;
}

// 원통 체적 계산
if (isset($_POST['cylinder_radius']) && isset($_POST['cylinder_height'])) {
  $cylinder_radius = $_POST['cylinder_radius'];
  $cylinder_height = $_POST['cylinder_height'];
  $cylinder_volume = pi() * pow($cylinder_radius, 2) * $cylinder_height;
  echo "원통 체적: " . $cylinder_volume;
}

// 구 체적 계산
if (isset($_POST['sphere_radius'])) {
  $sphere_radius = $_POST['sphere_radius'];
  $sphere_volume = 4 / 3 * pi() * pow($sphere_radius, 3);
  echo "구 체적: " . $sphere_volume;
}
?>



</body>
</html>