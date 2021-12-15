<?php
/**
 * @file Non-javascript usage example.
 *
 * @author Alexey Ptitsyn <numidium.ru@gmail.com>
 * @copyright Alexey Ptitsyn <numidium.ru@gmail.com>, 2021
 */

// Start session early:
require_once "../config/config.php";
require_once "../include/auth.php";
Auth::useSession();
?>
<!DOCTYPE html>
<html>
<head>
  <style>
  body {
    font-family: Verdana, Geneva, sans-serif;
    background: #ECEFF1;
    color: #263238;
  }

  button,
  input[type="submit"] {
    margin: 5px 0;
  }
  </style>
</head>
<body>
  <?php
  if(isset($_POST['logout'])) {
    Auth::logout();
  }
  ?>

  <?php
    if(isset($_POST['login']) && isset($_POST['password'])) {
      try {
        Auth::login($_POST['login'], $_POST['password']);
      } catch(Exception $e) {
        ?>
          <div>
            <b>Error:</b> <?=$e->getMessage()?>
          </div>
        <?php
      }
    }
  ?>

  <?php if(!Auth::isLoggedIn()): ?>
    <form action="" method="POST">
      Login: <input type="text" name="login" /><br />
      Password: <input type="password" name="password" /><br />
      <input type="submit" />
    </form>
  <?php else: ?>
    <?php
      // Database request example:
      require_once "../include/db.php";

      $result = '';
      try {
        $result = DB::request(
          'SELECT * FROM `test` WHERE `value` = :value',
          [
            'value' => 1
          ]
        );
      } catch(Exception $e) {
        $msg = $e->getMessage();
        $result = "Error: $msg";
      }
    ?>
    <pre><?php var_dump($result); ?></pre>

    <form action="" method="POST">
      <input type="hidden" name="logout" value="true" />
      <input type="submit" value="Log out" />
    </form>
  <?php endif; ?>

</body>
</html>
