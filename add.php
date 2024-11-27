<?php
// 送信チェック
if (isset($_POST['submit'])) {
  print_r($_POST);

  if (empty($_POST['pizza-name'])) {
    echo 'ピザの名前は必須入力です';
  } else {
    echo htmlspecialchars($_POST['pizza-name']);
  }

  if (empty($_POST['chef-name'])) {
    echo 'シェフの名前は必須入力です';
  } else {
    echo htmlspecialchars($_POST['chef-name']);
  }
}
?>
<?php include 'header.php'; ?>

<?php

// echo '<script>alert("アラート")</script>';
echo htmlspecialchars('<script>alert("アラート")</script>');

?>

<div class="container">
  <h1 class="my-5 h4 text-center">ピザの追加</h1>

  <div class="row justify-content-center">
    <div class="col-md-8 p-4">
      <form action="add.php" method="post">
        <div class="mb-3">
          <label for="pizza-name">ピザの名前</label>
          <input type="text" class="form-control" name="pizza-name" id="pizza-name" placeholder="クワトロフォルマッジ">
          <p class="form-text">ピザの名前を入力してください</p>
        </div>
        <div class="mb-3">
          <label for="chef-name">シェフの名前</label>
          <input type="text" class="form-control" name="chef-name" id="chef-name" placeholder="ピザ親父">
          <p class="form-text">ピザを考案したシェフの名前を入力してください</p>
        </div>
        <div class="mb-3">
          <p>トッピング</p>
          <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="toppings[]" id="topping-pepper" value="ピーマン">
            <label for="topping-pepper" class="form-check-label">ピーマン</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="toppings[]" id="topping-bacon" value="ベーコン">
            <label for="topping-bacon" class="form-check-label">ベーコン</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="toppings[]" id="topping-shrimp" value="えび">
            <label for="topping-shrimp" class="form-check-label">えび</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="toppings[]" id="topping-mushroom" value="マッシュルーム">
            <label for="topping-mushroom" class="form-check-label">マッシュルーム</label>
          </div>
        </div>
        <div>
          <button class="btn btn-primary w-100" name="submit" value="submit">追加する</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>