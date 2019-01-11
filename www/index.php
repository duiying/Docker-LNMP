<?php
// Docker-LNMP
try {
	$dbh = new PDO('mysql:host=mysql;dbname=mysql', 'root', root);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->exec('SET CHARACTER SET utf8');
	$dbh = null; 	
} catch(PDOException $e) {
	print 'Error: ' . $e->getMessage() . '<br>';
	die();
}
echo '<center><h2>成功通过 PDO 连接到 MySQL 服务器</h2></center>' . PHP_EOL;


$redis = new Redis();  
$result = $redis->connect('redis', 6379);  
if ($result) {
	echo '<center><h2>成功通过 PHP 连接到 Redis </h2></center>' . PHP_EOL;
}
// $redis->auth('123456');
$redis->set('key1', 'val1');
echo '<center><h2>Set Redis: key1 = ' . $redis->get('key1') . '</h2></center>' . PHP_EOL;

phpinfo();
