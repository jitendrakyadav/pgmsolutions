<?php
/**
 * Get reverse of a number
 * 
 * @param int $num
 * @return int
 */
function getReverseOfNumber($num)
{
    $revnum = 0;
    while ($num != 0) {
        $revnum = $revnum * 10 + $num % 10;
        //below cast is essential to round remainder towards zero
        $num = (int)($num / 10); 
    }
    return $revnum;
}
echo getReverseOfNumber(2039);


