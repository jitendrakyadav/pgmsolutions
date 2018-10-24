<?php
class A
{
    public $a;
    public $b;
    public $c;
    public $d;
}
$obj = new A();
$obj->a = 'Hi';
$obj->b = 'I';
$obj->c = 'am';
$obj->d = 'Vijay';

//Example 1: json encode, decode example with an object inside an array where json-decode is an object. 
//Remember: If you want json-decode data into all array(i.e. no any json object anywhere in json-decode data nesting) then 
//pass 2nd parameter as true in json_decode(). 
$prepareArr = array(
    "employee_id" => '123456789',
    "card_number" => "123456789",
    "my_intro" => array(
        "fname" => "Jitendra",
        "lname" => "Yadav",
        "company" => "Cybage",
        "about_A" => $obj
    )
);
$jsonData = json_encode($prepareArr);
echo $jsonData;
/*
Output: 
{"employee_id":"123456789","card_number":"123456789","my_intro":{"fname":"Jitendra","lname":"Yadav","company":"Cybage","about_
A":{"a":"Hi","b":"I","c":"am","d":"Vijay"}}}
 */
echo "\n\n";
var_dump(json_decode($jsonData));
/*
Output:
object(stdClass)#2 (3) {
  ["employee_id"]=>
  string(9) "123456789"
  ["card_number"]=>
  string(9) "123456789"
  ["my_intro"]=>
  object(stdClass)#3 (4) {
    ["fname"]=>
    string(8) "Jitendra"
    ["lname"]=>
    string(5) "Yadav"
    ["company"]=>
    string(6) "Cybage"
    ["about_A"]=>
    object(stdClass)#4 (4) {
      ["a"]=>
      string(2) "Hi"
      ["b"]=>
      string(1) "I"
      ["c"]=>
      string(2) "am"
      ["d"]=>
      string(5) "Vijay"
    }
  }
}
 */
echo "\n\n";

//Example 2: json encode, decode example with an array inside an array where json-decode is an object
$prepareArr2 = array(
    "employee_id" => '123456789',
    "card_number" => "123456789",
    "my_intro" => array(
        "fname" => "Jitendra",
        "lname" => "Yadav",
        "company" => "Cybage",
        "about_A" => array(
            "a" => $obj->a,
            "b" => $obj->b,
            "c" => $obj->c,
            "d" => $obj->d,
        )
    )
);
$jsonData2 = json_encode($prepareArr2);
echo $jsonData2;
/*
Output:
{"employee_id":"123456789","card_number":"123456789","my_intro":{"fname":"Jitendra","lname":"Yadav","company":"Cybage","about_
A":{"a":"Hi","b":"I","c":"am","d":"Vijay"}}}
 */
echo "\n\n";
var_dump(json_decode($jsonData2));
/*
Output:
object(stdClass)#2 (3) {
  ["employee_id"]=>
  string(9) "123456789"
  ["card_number"]=>
  string(9) "123456789"
  ["my_intro"]=>
  object(stdClass)#3 (4) {
    ["fname"]=>
    string(8) "Jitendra"
    ["lname"]=>
    string(5) "Yadav"
    ["company"]=>
    string(6) "Cybage"
    ["about_A"]=>
    object(stdClass)#4 (4) {
      ["a"]=>
      string(2) "Hi"
      ["b"]=>
      string(1) "I"
      ["c"]=>
      string(2) "am"
      ["d"]=>
      string(5) "Vijay"
    }
  }
}
 */
echo "\n\n";

//Example 3: json encode, decode example with an object inside an array where json-decode is an array
$prepareArr3 = array(
    "employee_id" => '123456789',
    "card_number" => "123456789",
    "my_intro" => array(
        "fname" => "Jitendra",
        "lname" => "Yadav",
        "company" => "Cybage",
        "about_A" => $obj
    )
);
$jsonData3 = json_encode($prepareArr3);
echo $jsonData3;
/*
Output:
{"employee_id":"123456789","card_number":"123456789","my_intro":{"fname":"Jitendra","lname":"Yadav","company":"Cybage","about_
A":{"a":"Hi","b":"I","c":"am","d":"Vijay"}}}
 */
echo "\n\n";
var_dump(json_decode($jsonData3, true));
/*
Output:
array(3) {
  ["employee_id"]=>
  string(9) "123456789"
  ["card_number"]=>
  string(9) "123456789"
  ["my_intro"]=>
  array(4) {
    ["fname"]=>
    string(8) "Jitendra"
    ["lname"]=>
    string(5) "Yadav"
    ["company"]=>
    string(6) "Cybage"
    ["about_A"]=>
    array(4) {
      ["a"]=>
      string(2) "Hi"
      ["b"]=>
      string(1) "I"
      ["c"]=>
      string(2) "am"
      ["d"]=>
      string(5) "Vijay"
    }
  }
}
 */
echo "\n\n";

//Example 4: json-decode into array of a pre-ready json-data 
$jsonData4 = '{"employee_id": 123456789,"card_number" :"123456789"}';
echo $jsonData4;
/*
Output:
{"employee_id": 123456789,"card_number" :"123456789"}
 */
echo "\n\n";
print_r(json_decode($jsonData4, true));
/*
Output:
Array
(
    [employee_id] => 123456789
    [card_number] => 123456789
)
 */