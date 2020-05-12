<?php
/**
 * 假设规定标题不能为纯数字，不能为纯字母，不能包含彩票/广告/启示字眼，请写出一条判断标题是否合规的正则
 */


$title = '121';
// 正则结果取反即可
$p1 = "/^\d+$|^[a-zA-Z]+$|广告|彩票|启示/u";
$res = preg_match($p1, $title);
var_dump($res, $p1, $title);



