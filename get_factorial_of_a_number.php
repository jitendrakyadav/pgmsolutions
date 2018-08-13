<?php
/**
 * For an integer n greater than or equal to 1, the factorial is the product of all integers less than 
 * or equal to n but greater than or equal to 1. The factorial value of 0 is defined as equal to 1. The factorial 
 * values for negative integers are not defined.
 * 0! = 1, 1! = 1, 2! = 2
 * Get factorial of a number $n
 * 
 * @param int $n
 * @return int
 */
function getFactorialOfANumber($n) 
{
    $x = 1;
    for ($i = 1; $i < $n; $i++) {
        $x *= ($i + 1);
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
        return $n * factorial($n - 1);
    }
}
echo getFactorialOfANumber(5)."\n<br>";
echo factorial(5)."\n<br>";

