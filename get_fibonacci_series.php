<?php
 /**
  * Fibonacci series:
  * a series of numbers in which each number ( Fibonacci number ) is the sum of the two preceding numbers.
  * The simplest is the series 1, 1, 2, 3, 5, 8, etc.
  * Draw fibonacci series up to n numbers
  * 
  * @param int $n
  * @return int
  */
function getFibonacciSeries($n)
{
    $a = 0;
    $b = 1;
    $d = $a.' '.$b.' ';
    for ($i = 2; $i < $n; $i++) {
        $c = $a + $b;
        $d .= $c . ' ';
        $a = $b;
        $b = $c;
    }
    return $d;
}
echo getFibonacciSeries(8);
