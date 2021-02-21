<?php
require_once("AuthDAO.php");
?>
<?php
class Controller {

  /**
   * 処理を分岐する。
   */
	static function dispatch():void {
	  // URLの設定
		$nextPage = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/~ubuntu/workshops/oop/task-example/";
		// リクエストパラメータを取得
		isset($_REQUEST["action"]) ? $action = $_REQUEST["action"] : $action = "";
		
		// actionキーによって処理を分岐
		if ($action === "auth") {
			// ユーザ認証の場合
			$nextPage .= self::auth();
		} elseif ($action === "logout") {
		  // ログアウトする場合
		  self::logout();
			$nextPage .= "login.php";
		} else {
		  // 想定外のactionキーが代入された場合：不正なactionキーなので強制的にログインページに遷移
			$nextPage .= "login.php";
		}
		// 設定されたURLに遷移
		header("Location: {$nextPage}");
	}

	/**
	 * ユーザ認証を行う。
	 * @return string 遷移先URL
	 */
	static function auth():string {
		// リクエストパラメータを取得
		isset($_REQUEST["uid"]) ? $uid = $_REQUEST["uid"] : $uid = "";
		isset($_REQUEST["password"]) ? $password = $_REQUEST["password"] : $password = "";
		// AuhtDAOをインスタンス化
		$dao = new AuthDAO();
		// ユーザIDとパスワードの組み合わせが合致したユーザを取得
		$auth = $dao->findByUidAndPass($uid, $password);

		$nextPage = "page.php";
		if (!is_null($auth)) {
			// ユーザが存在する場合：セッションにユーザIDを設定
			session_start();
			$_SESSION["login"] = $auth->getUid();
		}
		return $nextPage;
	}
	
	/**
	 * ログアウトする
	 */
	static function logout():void {
	  session_start();
	  unset($_SESSION["login"]);
	}
}