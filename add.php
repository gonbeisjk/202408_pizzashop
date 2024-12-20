<?php
session_start();

require 'dbconnect.php';

// エラーメッセージ用の配列
$errors = [
  'pizza-name' => '',
  'chef-name' => '',
  'toppings' => '',
];

// 入力値の再反映用の変数
$pizzaName = '';
$chefName = '';
$toppings = [];

// 送信チェック
if (isset($_POST['submit'])) {
  // print_r($_POST);
  // print_r($_POST['toppings']);

  if (empty($_POST['pizza-name'])) {
    $errors['pizza-name'] = 'ピザの名前は必須入力です';
  } else {
    if (!preg_match('/^([^\x01-\x7E]|[\da-zA-Z ])+$/', $_POST['pizza-name'])) {
      $errors['pizza-name'] =  '日本語、英数字のみ有効です。記号等は使用できません';
    }
    $pizzaName = $_POST['pizza-name'];
  }

  if (empty($_POST['chef-name'])) {
    $errors['chef-name'] =  'シェフの名前は必須入力です';
  } else {
    if (!preg_match('/^([^\x01-\x7E]|[\da-zA-Z ])+$/', $_POST['chef-name'])) {
      $errors['chef-name'] =  '日本語、英数字のみ有効です。記号等は使用できません';
    }
    $chefName = $_POST['chef-name'];
  }

  // チェックされなかった場合（データが存在しない場合 == null）も考慮する
  // $toppings = isset($_POST['toppings']) ? $_POST['toppings'] : [];
  $toppings = $_POST['toppings'] ?? [];
  if ($toppings) {
    $toppings_text = implode(',', $toppings);
  } else {
    $toppings_text = '';
  }

  // 最終エラーチェック
  if (!array_filter($errors)) {
    // echo 'エラーはありません';

    // データベースへの登録
    $stmt = $db->prepare('INSERT INTO pizzas (pizza_name, chef_name, toppings) VALUES (?,?,?)');
    $stmt->bindValue(1, $_POST['pizza-name']);
    $stmt->bindValue(2, $_POST['chef-name']);
    $stmt->bindValue(3, $toppings_text);
    $result = $stmt->execute();

    if ($result) {
      $_SESSION['success'] = 'ピザの登録が完了しました';

      // リダイレクト(別ページへ遷移させる)
      header('location: index.php');
      exit; // die; 処理をここでストップ
    }
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
          <input type="text" class="form-control" name="pizza-name" id="pizza-name" placeholder="クワトロフォルマッジ" value="<?= htmlspecialchars($pizzaName); ?>">
          <p class="form-text">ピザの名前を入力してください</p>
          <p class="text-danger"><?= $errors['pizza-name']; ?></p>
        </div>
        <div class="mb-3">
          <label for="chef-name">シェフの名前</label>
          <input type="text" class="form-control" name="chef-name" id="chef-name" placeholder="ピザ親父" value="<?= htmlspecialchars($chefName); ?>">
          <p class="form-text">ピザを考案したシェフの名前を入力してください</p>
          <p class="text-danger"><?= $errors['chef-name']; ?></p>
        </div>
        <div class="mb-3">
          <p>トッピング</p>
          <div class="form-check form-check-inline">
            <input
              type="checkbox"
              class="form-check-input"
              name="toppings[]"
              id="topping-pepper"
              value="ピーマン"
              <?= in_array('ピーマン', $toppings) ? 'checked' : ''; ?>>
            <label for="topping-pepper" class="form-check-label">ピーマン</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="checkbox"
              class="form-check-input"
              name="toppings[]"
              id="topping-bacon"
              value="ベーコン"
              <?= in_array('ベーコン', $toppings) ? 'checked' : ''; ?>>
            <label for="topping-bacon" class="form-check-label">ベーコン</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="checkbox"
              class="form-check-input"
              name="toppings[]"
              id="topping-shrimp"
              value="えび"
              <?= in_array('えび', $toppings) ? 'checked' : ''; ?>>
            <label for="topping-shrimp" class="form-check-label">えび</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="checkbox"
              class="form-check-input"
              name="toppings[]"
              id="topping-mushroom"
              value="マッシュルーム"
              <?= in_array('マッシュルーム', $toppings) ? 'checked' : ''; ?>>
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