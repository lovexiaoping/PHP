<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./adminCss/ArAdd.css"/>

</head>
<body>
<div id="addF">
    <h1>新增图书</h1>
    <form method="get" action="articleAddHandle.php">
        <h4 id="h4">书名</h4>
        <input type="text" required="required" placeholder="书名" name="shopname"> </input>
        <h4>作者</h4>
        <input type="text" required="required" placeholder="作者" name="author"> </input>
        <h4>描述</h4>
        <textarea  name="des" rows="10" cols="30"> 描述 </textarea>

       <button class="but" type="submit">保存</button>
<!--       <input type="submit" name="submit" id="button" value="tijiao"></input>-->
    </form>

</div>
</body>
</html>