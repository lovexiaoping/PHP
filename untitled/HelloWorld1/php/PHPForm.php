<html>
<head>
    <meta charset="utf-8">
    <title>php中文网</title>

    <script>
        function newDoc() {
            window.location.assign("http://www.cnblogs.com/Extreme/p/3576860.html")
        }
        function goback() {
            window.history.back();
        }
        function goForward() {
            window.history.forward();
        }
    </script>
</head>

<body>
<h1 id="id1" > abcdefg </h1>
<form action="ewlcome.php" method="post">

    名字:<input type="text" name="fname">
    年龄:<input type="text" name="age">
    <input type="submit" value="提交">

</form>

<button type="button" onclick="document.getElementById('id1').style.color= 'red'">点击这里 </button>
<button type="button" onclick="newDoc()">点击这里</button>


</body>



</html>