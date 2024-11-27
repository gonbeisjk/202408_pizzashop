<?php include 'header.php'; ?>

<form action="index.php" method="post">
  <input type="text" name="test"><br>
  <input type="email" name="email"><br>
  <!-- <input type="submit" value="送信"> -->
  <button type="submit">送信</button>
</form>

<p>
  <?php print_r($_GET); ?>
  <?php print_r($_POST); ?>
</p>

<?php include 'footer.php'; ?>