<?php
require_once 'database.php';
class m_user extends database {
	function login($username, $password) {
		$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($username,$password));
		$this->disconnect();
	}

	function getuser($uid) {
		$sql = "SELECT * FROM users WHERE uid = ?";
		$this->setQuery($sql);
		return $this->loadRow(array($uid));
		$this->disconnect();
	}

	function loadUserList($listUserGroups) {
		$sql = "SELECT uid, fullname, chuc_danh, ld_phutrach FROM users WHERE user_group IN($listUserGroups) AND role = 2";
		$this->setQuery($sql);
		return $this->loadAllRows();
		$this->disconnect();
	}

	function updatePersonalInfo($uid, $ld_phutrach) {
		$sql = "UPDATE users SET ld_phutrach = ? WHERE uid = ?";
		$this->setQuery($sql);
		$this->execute(array($ld_phutrach, $uid));
		$this->disconnect();
	}
}
?>