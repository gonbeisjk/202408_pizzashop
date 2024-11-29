<?php
require 'dbconnect.php';

// データの読み出し
$sql = 'SELECT * FROM pizzas';
$result = $db->query($sql);
// var_dump($result->fetch());
// var_dump($result->fetchAll());
$pizzas = $result->fetchAll(); //全データの多次元+連想配列

?>
<?php include 'header.php'; ?>

<div class="container">
  <h1 class="text-center display-4 my-5">
    Our Special Pizzas
  </h1>
  <div class="row">
    <?php foreach ($pizzas as $pizza): ?>
      <div class="col-md-4">
        <div class="card h-100">
          <img src="https://dummyimage.com/600x400/666/fff&text=PIZZA" alt="" class="card-img-top">
          <div class="card-body">
            <h3 class="h5"><?= $pizza['pizza_name']; ?></h3>
            <p class="card-text">by <?= $pizza['chef_name']; ?></p>
          </div>
          <div class="card-footer text-end">
            <a href="detail.php?id=<?= $pizza['id']; ?>" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include 'footer.php'; ?>