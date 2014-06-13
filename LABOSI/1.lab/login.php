<?php 

$userName=$_GET['userName'];

echo ('<script type="text/javascript">');
echo ('setTimeout(function() { window.location = "http://192.168.56.101/1.lab/zivotopis.php"; }, 1000);');
echo ('</script>');

?>