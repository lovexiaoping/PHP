<?php
// 上面的代码抛出了一个异常，并捕获了它：
// 创建 checkNum() 函数。它检测数字是否大于 1。如果是，则抛出一个异常。
// 在 "try" 代码块中调用 checkNum() 函数。
// checkNum() 函数中的异常被抛出
// "catch" 代码块接收到该异常，并创建一个包含异常信息的对象 ($e)。
// 通过从这个 exception 对象调用 $e->getMessage()，输出来自该异常的错误消息

 function checkNum($number){

  if ($number>1) {
      throw new Exception("Error Processing Request", 1);
    }
    return true;
}

try{
  checkNum(2);

  echo '如果能看到这个提示，说明你的数字小于等于1';

} catch(Exception $e){
  echo '捕获异常' .$e->getMessage();


   $msg = 'Error:'.$ex->getMessage()."\n";
   $msg.= $ex->getTraceAsString()."\n";
   $msg.= '异常行号：'.$ex->getLine()."\n";
   $msg.= '所在文件：'.$ex->getFile()."\n";
   //将异常信息记录到日志中
   file_put_contents('error.log', $msg);
}
 ?>
