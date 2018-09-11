<?php
require_once 'vendor/autoload.php';

class Resource
{
    public function getResource($n)
    {
        return factorial($n);
    }
}
$object = new Resource();
echo 'I have got factorial of 6: '.$object->getResource(6);
