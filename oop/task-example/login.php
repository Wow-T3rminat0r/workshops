<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>課題</title>
</head>
<body>
	<h1>ログイン</h1>
	<p>ユーザIDとパスワードを入力して、［ログイン］ボタンをクリックしてください。</p>
	<table>
	<form action="index.php?action=auth" method="post">
		<tr>
			<th>ユーザID</th>
			<td><input type="text" name="uid" /></td>
		</tr>
		<tr>
			<th>パスワード</th>
			<td><input type="text" name="password" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="ログイン" /></td>
		</tr>
	</form>
	</table>
</body>
</html>