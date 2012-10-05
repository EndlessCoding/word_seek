<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($kw); ?>搜索结果</title>

<script type="text/javascript" src="../Public/js/TpJquery/jquery.js"></script>
<script type="text/javascript" src="../Public/js/TpJquery/jquery.form.js"></script>
<script language="JavaScript">
function checkName(){
    $.post('__URL__/checkName',{'keyword':$('#keyword').val()},function(data){
        $('#result').html(data.info).show();
       
    },'json');
};
</script>

</head>

<body>

<div style="text-align:center">
<img src="../Public/images/logo.gif" width="60" height="40" />
<!--<form action="__URL__/seek" method="get" enctype="multipart/form-data">
<input type="text" name="keyword" " onkeyup="checkName()"/>
<input type="submit" name="submit" value="查询" />
</form>-->
<form method="get" action="__URL__/seek">
<input type="text" name="keyword" id="keyword" value="<?php echo ($kw); ?>" onkeyup="checkName()"/>
<input type="submit" value="查找">
</form>
</div>
<br />
<?php echo ($result); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<div id="result" style="color:red"></div>
<div id="list" style="color:green"></div>


<br /><br />
<div style="text-align:center">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
Powered By <a href="http://icat.scuec.edu.cn:8000/cl" target="_new"><font size="-1">陈龙</a> 资源共享 2012.10.02

</div>

</body>
</html>