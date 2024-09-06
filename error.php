<?php 
$http_status_code = $_GET['http_status_code'] ?? "500";
?>
<!DOCTYPE html>
<html>
<head>
<title>Error</title>
<style>
html { color-scheme: light dark; }
body { width: 35em; margin: 0 auto;
font-family: Tahoma, Verdana, Arial, sans-serif; }
</style>
</head>
<body>
<h2>Something went wrong.</h2>
<h1>Http status code: <?php echo $http_status_code ?></h1>
</body>
</html>
