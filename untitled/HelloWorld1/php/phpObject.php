<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/26
 * Time: 下午3:11
 * php 面向对象
 */
//声明一个接口
interface iTemplate{
    public function setVariable($name,$varl);
    public function getHtml($template);

}
//实现接口
class Template implements iTemplate{

    private $vars =array();

    public function setVariable($name,$varl){

        $this->vars[$name] = $varl;

    }
    public function getHtml($template){
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;


    }

}
?>