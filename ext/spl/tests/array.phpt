--TEST--
SPL: array
--SKIPIF--
<?php if (!extension_loaded("spl")) print "skip"; ?>
--FILE--
<?php

$ar = array(0=>0, 1=>1);
$ar = new spl_array($ar);

var_dump($ar);

$ar[2] = 2;
var_dump($ar[2]);
var_dump($ar["3"] = 3);

var_dump(array_merge((array)$ar, array(4=>4, 5=>5)));

var_dump($ar["a"] = "a");

var_dump($ar);
var_dump($ar[0]);
var_dump($ar[6]);
var_dump($ar["b"]);

unset($ar[1]);
unset($ar["3"]);
unset($ar["a"]);
unset($ar[7]);
unset($ar["c"]);
var_dump($ar);

echo "Done\n";
?>
--EXPECTF--
object(spl_array)#1 (2) {
  [0]=>
  int(0)
  [1]=>
  int(1)
}
int(2)
int(3)
array(6) {
  [0]=>
  int(0)
  [1]=>
  int(1)
  [2]=>
  &int(2)
  [3]=>
  &int(3)
  [4]=>
  int(4)
  [5]=>
  int(5)
}
string(1) "a"
object(spl_array)#1 (5) {
  [0]=>
  int(0)
  [1]=>
  int(1)
  [2]=>
  &int(2)
  [3]=>
  &int(3)
  ["a"]=>
  &string(1) "a"
}
int(0)

Notice: Undefined offset:  6 in %sarray.php on line %d
NULL

Notice: Undefined index:  b in %sarray.php on line %d
NULL

Notice: Undefined offset:  7 in %sarray.php on line %d

Notice: Undefined index:  c in %sarray.php on line %d
object(spl_array)#1 (2) {
  [0]=>
  int(0)
  [2]=>
  &int(2)
}
Done
