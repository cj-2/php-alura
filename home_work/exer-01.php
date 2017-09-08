<?php
  $arr = array(5, 8, 10, 18, 28, 9, 28, 7);
  function somar($item){
    $total = 0;
    for ($i = 0 ; $i < sizeof($item) ; $i++) {
      $total += $item[$i];
    }
    echo $total;
  }
  somar($arr);
 ?>
