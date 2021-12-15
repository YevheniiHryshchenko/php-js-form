<?php

$pdo = include($_SERVER['DOCUMENT_ROOT'] . '/services/GettingDb.php');
$sql = "SELECT id, name FROM brands WHERE goods_type_id = {$_GET['goodsTypeId']}";
$queryRes = $pdo->query($sql);
$queryRes->setFetchMode(PDO::FETCH_ASSOC);

echo json_encode($queryRes->fetchAll());
