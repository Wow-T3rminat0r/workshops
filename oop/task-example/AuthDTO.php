<?php
/**
 * authテーブルの1件のレコードを保持するクラス
 */
class AuthDTO {
	/**
	 * プロパティ
	 */
	private $uid;
	private $password;

	/**
	 * コンストラクタ
	 * @param string ユーザID
	 * @param string パスワード
	 */
	function __construct(string $uid, string $password) {
		$this->uid = $uid;
		$this->password = $password;
	}

	/** アクセサメソッド群 */
	function setUid(string $uid):void {
		$this->uid = $uid;
	}

	function getUid():string {
		return $this->uid;
	}

	function setPassword(string $password):void {
		$this->password = $password;
	}
}