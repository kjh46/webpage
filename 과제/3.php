<?php
$n = 10;
$prev1 = 0;
$prev2 = 1;

for ($i = 0; $i < $n; $i++) {
  $current = $prev1 + $prev2;
  echo "$current (앞뒤 비례: ".($prev1 === 0 ? "-" : round($prev2 / $prev1, 2)).")\n";
  $prev1 = $prev2;
  $prev2 = $current;
}
?>