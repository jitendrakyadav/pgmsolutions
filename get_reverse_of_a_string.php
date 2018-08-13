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
    for ($i = strlen($x) - 1, $j = 0; $j < $i; $i--, $j++) {
        list($x[$j], $x[$i]) = array($x[$i], $x[$j]);
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
    $l = strlen($x);
    for ($i = $l; $i > 0; $i--) {
        echo $x[$i-1];
    }
}
getReverseOfString('Hello Jitendra!');
