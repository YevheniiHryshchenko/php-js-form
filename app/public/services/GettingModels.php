<?php

$pdo = include($_SERVER['DOCUMENT_ROOT'] . '/services/GettingDb.php');
$sql = "SELECT id, name FROM models WHERE brand_id = {$_GET['brandId']}";
$queryRes = $pdo->query($sql);
$queryRes->setFetchMode(PDO::FETCH_ASSOC);

echo json_encode($queryRes->fetchAll());
