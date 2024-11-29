<?php
require 'dbconnect.php';

if (isset($_GET['id'])) {
  $stmt = $db->prepare('SELECT * FROM pizzas WHERE id = ?');
  $stmt->bindValue(1, $_GET['id']);
  $result = $stmt->execute();

  if ($result) {
    $pizza = $stmt->fetch();
    if (!$pizza) {
      header('location: index.php');
      exit;
    }
  }
} else {
  header('location: index.php');
  exit;
}
?>
<?php include 'header.php'; ?>

<div class="container">
  <h1 class="text-center display-4 my-5">
    Pizza Detail
  </h1>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <img src="https://dummyimage.com/800x500/9f2/fff&text=PIZZA" alt="" class="card-img-top">
        <div class="card-body">
          <h2 class="h4"><?= htmlspecialchars($pizza['pizza_name']); ?></h2>
          <p class="card-text">by <?= htmlspecialchars($pizza['chef_name']); ?></p>
          <?php
          if ($pizza['toppings']) :
            $toppings = explode(',', $pizza['toppings']);
          ?>
            <ul>
              <?php foreach ($toppings as $topping): ?>
                <li><?= htmlspecialchars($topping); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          <p class="card-text text-muted">登録日: <?= htmlspecialchars($pizza['created_at']); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>