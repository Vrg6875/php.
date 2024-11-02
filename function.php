<?php

function vicky($marks){
    $sum=0;
    foreach ($marks as $value){
        $sum+=$value;
    
    }
    echo $sum;

    

}
vicky([10,20,30]);

  

?>