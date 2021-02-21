<?php
session_start();
isset($_SESSION["login"]) ? $login = $_SESSION["login"] : $lpogin = "";
?>
<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>ログイン結果</title>
</head>
<body>
	<?php if (!empty($login)): ?>
	<p>ようこそ、<?= $login ?>さん</p>
	<p>ログインに成功しました。</p>
	<p><a href="<?= "index.php?action=logout" ?>">ログアウトする</a></p>
	<?php else: ?>
	<p>ログインに失敗しました。</p>
	<p><a href="<?= "index.php" ?>">ログインページに戻る</a></p>
	<?php endif; ?>
</body>
</html>