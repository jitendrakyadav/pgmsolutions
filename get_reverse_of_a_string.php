<?php
/**
 * Get reverse of a string
 * Although there is a dedicated function "strrev" in PHP for this task
 * More efficient way i.e. swapping of characters, which requires less no of loop execution
 * 
 * @param string $x
 * @return string
 */
function getReverseOfString2($x)
{
    for ($i = 0, $j = strlen($x) - 1; $i < $j; $i++, $j--) {
        list($x[$i], $x[$j]) = array($x[$j], $x[$i]);
    }
    return $x;
}
echo getReverseOfString2('Hello Jitendra!') . "\n";

 /**
  * Get reverse of a string
  * 
  * @param string $x
  * @return string
  */
function getReverseOfString($x)
{
    for ($i = strlen($x); $i > 0; $i--) {
        echo $x[$i-1];
    }
}
getReverseOfString('Hello Jitendra!');
