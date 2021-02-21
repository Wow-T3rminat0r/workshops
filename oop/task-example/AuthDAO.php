<?php
require_once "AuthDTO.php";
?>
<?php
/**
 * authテーブルにアクセスするDAOクラス
 */
class AuthDAO {

	/**
	 * クラス定数
	 */
	const DB_DSN = "mysql:host=localhost;dbname=authdb;port=3306;charset=utf8";
	const DB_USER = "root";
	const DB_PASSWORD = "";

	/**
	 * プロパティ
	 */
	private $pdo;

	/**
	 * コンストラクタ
	 */
	function __construct() {
		try {
			$this->pdo = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	/**
	 * ユーザIDとパスワードからユーザを取得する。
	 * @param string ユーザID
	 * @param string パスワード
	 * @return AuthDTO|null 指定されたユーザIDとパスワードの組み合わせに合致したユーザが存在する場合はそのユーザのインスタンス、それ以外はnull
	 */
	function findByUidAndPass(string $uid, string $password):?AuthDTO {
		
		$sql = "select * from auth where uid = :uid and password = :password";
		$params = [];
		$params[":uid"] = $uid;
		$params[":password"] = $password;
		
		try {
			// SQL実行オブジェクトを取得
			$pstmt = $this->pdo->prepare($sql);
			// SQLを実行
			$pstmt->execute($params);
			// 実行結果を結果セットに取得
			$records = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			$auth = null;
			if (count($records) > 0) {
				// 結果セットからAuthDTOクラスをインスタンス化
				$auth = new AuthDTO($records[0]["uid"], $records[0]["password"]);
			}
			return $auth;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	/**
	 * デストラクタ
	 */
	function __destruct() {
		unset($this->pdo);
	}
}