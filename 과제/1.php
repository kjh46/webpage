<?php
$n = 30;
$sum = 0;
$prod = 1;
for($i=1;$i<=$n;$i++){
    $sum = $sum + $i;
    $prod = $prod * $i;
}
echo("$sum\n");
echo("$prod");
?>