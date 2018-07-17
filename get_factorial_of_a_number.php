<?php
/**
 * Get factorial of a number
 * 
 * @param int $n
 * @return int
 */
function getFactorialOfANumber($n) 
{
    $x = 1;
    for ($i = 1; $i < $n; $i++) {
        $x *= ($i+1);
    }
    return $x;
}
/**
 * Get factorial of a number using recursive function
 * 
 * @param int $n
 * @return int
 */
function factorial($n)
{
    if ($n < 2) {
        return 1;
    } else {
        return $n * factorial($n-1);
    }
}
echo getFactorialOfANumber(5)."\n<br>";
echo factorial(5)."\n<br>";

