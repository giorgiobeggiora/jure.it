<?php
function minify_output($buffer)
{
$search = array(
'/\s*([<>\{\}:;])\s*/s',
'/&#32;/s',
'/(\s){2,}/s',
);
$replace = array(
'\\1',
' ',
' ',
);
if (preg_match("/\<html/i",$buffer) == 1 && preg_match("/\<\/html\>/i",$buffer) == 1) {
$buffer = preg_replace($search, $replace, $buffer);
}
return $buffer;
}
ob_start("minify_output");
?>