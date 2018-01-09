<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/30
 * Time: 上午11:55
 */$brand =  'logo';

$url = "http://image.baidu.com/search/index?tn=baiduimage&ipn=r&ct=201326592&cl=2&lm=-1&st=-1&fm=index&fr=&sf=1&fmq=&pv=&ic=0&nc=1&z=&se=1&showtab=0&fb=0&width=&height=&face=0&istype=2&ie=utf-8&word={$brand}&oq={$brand}&rsp=-1";
$content = file_get_contents($url);
preg_match_all('/objURL":"(.*?)",/',$content,$match);
print_r($match);
?>