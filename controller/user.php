<?php
require('../model/user.php');
class c_user {
	function login($username, $password) {
		$m_user = new m_user();
		$user = $m_user->login($username, $password);
		if ($user == true) {
			$_SESSION['uid'] = $user->uid;
			header('Location: ../');
			if (isset($_SESSION['login_error'])) {
				unset($_SESSION['login_error']);
			}
		} else {
			$_SESSION['login_error'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
			header('Location: ./');
		}
	}

	function get_user(){
		if (!isset($_SESSION['uid'])) {
			session_start();
		}
		$m_user = new m_user();
		$get_user = $m_user->getuser($_SESSION['uid']);
		return array('get_user'=>$get_user);
	}

	function load_UserList($listUserGroups){
		$m_user = new m_user();
		$UserList = $m_user->loadUserList($listUserGroups);
		return array('list'=>$UserList);
	}

	function update_PersonalInfo($uid, $ld_phutrach){
		$m_user = new m_user();
		$m_user->updatePersonalInfo($uid, $ld_phutrach);
	}
}
?>