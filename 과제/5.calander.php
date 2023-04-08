<?php
// year와 month 변수를 입력받습니다.
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('n');

// 입력된 년도와 월에 해당하는 달력을 출력합니다.
echo "<table>";
echo "<tr>";
echo "<th>일</th>";
echo "<th>월</th>";
echo "<th>화</th>";
echo "<th>수</th>";
echo "<th>목</th>";
echo "<th>금</th>";
echo "<th>토</th>";
echo "</tr>";

// 입력된 년도와 월을 이용하여 해당 월의 시작일과 마지막일을 계산합니다.
$first_day_of_month = strtotime("$year-$month-01");
$last_day_of_month = strtotime(date('Y-m-t', $first_day_of_month));
$last_day_of_prev_month = strtotime('-1 day', strtotime(date('Y-m-01', $first_day_of_month)));

// 이전달 날짜 출력
echo "<tr>";
for ($i = 1; $i <= date('w', $first_day_of_month); $i++) {
  echo "<td class='grayed'>" . date('j', strtotime('-' . (date('w', $first_day_of_month) - $i) . ' day', $first_day_of_month)) . "</td>";
}

// 이번달 날짜 출력
for ($day = 1; $day <= date('t', $first_day_of_month); $day++) {
  $weekday = date('w', strtotime("$year-$month-$day"));
  if ($weekday == 0) {
    echo "</tr><tr>";
  }
  echo "<td>$day</td>";
}

// 다음달 날짜 출력
for ($i = date('w', $last_day_of_month); $i < 6; $i++) {
  echo "<td class='grayed'>" . (date('j', strtotime('+' . ($i - date('w', $last_day_of_month) + 1) . ' day', $last_day_of_month))) . "</td>";
}
echo "</tr>";
echo "</table>";
?>