<?php

$pdo = include($_SERVER['DOCUMENT_ROOT'] . '/services/GettingDb.php');
$sql = 'SELECT * FROM goods_types';
$queryRes = $pdo->query($sql);
$queryRes->setFetchMode(PDO::FETCH_ASSOC);
$goodsTypes = $queryRes->fetchAll();
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Index page</title>
  <meta name="description" content="Index page">
  <meta name="author" content="Author">

  <meta property="og:title" content="Index page">
  <meta property="og:type" content="website">
  <meta property="og:url" content="http://127.0.0.1/">
  <meta property="og:description" content="Index page">
  <meta property="og:image" content="images/image.png">

  <link rel="icon" href="favicon.ico">
  <link rel="icon" href="favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="favicon.png">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
  <form class="main-form">
    <select onchange="getBrands(event)" class="select">
      <option value="" disabled selected hidden>Тип</option>
      <?php foreach($goodsTypes as $goodsType): ?>
        <option value=<?= $goodsType['id'] ?>><?= $goodsType['name'] ?></option>
      <?php endforeach; ?>
    </select>

    <select onchange="getModels(event)" class="select" id="brands">
      <option id="def-brand-opt" value="" disabled selected hidden>Марка</option>
    </select>

    <select class="select" id="models">
      <option id="def-model-opt" value="" disabled selected hidden>Модель</option>
    </select>
  </form>
  <script src="js/index.js"></script>
</body>
</html>