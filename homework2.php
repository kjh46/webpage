<?php
$n = 10;
// 랜덤 숫자 생성
for ($i = 0; $i < $n; $i++) {
  $number = rand(10, 100);
  $numbers[] = $number;
}
// 소팅
sort($numbers);
// 생성된 랜덤 넘버와 소팅된 결과 출력
echo "생성된 랜덤 넘버: ";
for ($i = 0; $i < count($numbers); $i++) {
  echo $numbers[$i] . " ";
}

?>