<?php

$text = file_get_contents('texts/test.txt');
if(!is_dir('texts1')){
    mkdir('texts1');    
}
file_put_contents('test1.txt', $text . 'world!');
echo file_get_contents('texts1/test1.txt');

?>