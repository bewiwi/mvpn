<?php 
require_once('AbstractPdoManager.class.php');

class PdoUserManager extends AbstractPdoManager {
	public function addUser($firstName, $lastName, $login, $password) {
		$query = $this->pdo->prepare('INSERT INTO user(usrlog, usrpwd, usrnom, usrpre) VALUES (:login, :password, :lastname, :firstname)');
		$query->bindValue(':login', $login);
		$query->bindValue(':password', sha1($password));
		$query->bindValue(':lastname', strtoupper($lastName));
		$query->bindValue(':firstname', ucfirst($firstName));
		if($query->execute()) {
			return $this->pdo->lastInsertId();
		} else {
			return 0;
		}
	}
	
	public function getUserById($userID) {
		$query = $this->pdo->prepare("SELECT * FROM user WHERE id = :userid");
		$query->bindValue(':userid', $userID);
		$query->execute();
		$user = $query->fetch(PDO::FETCH_OBJ);
		$u = new User($user->id, $user->usrnom, $user->usrpre, $user->usrlog, $user->usrpwd, $user->usrloc);
		return $u;
	}
	
	public function lockUser($userID) {
		$query1 = $this->pdo->prepare("SELECT * FROM user WHERE id = :userid");
		$query = $this->pdo->prepare('UPDATE user SET usrloc = :value WHERE id = :userid');
		$query1->bindValue(':userid', $userID);
		$query1->execute();
		$user = $query1->fetch(PDO::FETCH_OBJ);
		if($user->usrloc == 0) {
			$query->bindValue(':userid', $userID);
			$query->bindValue(':value', 1);
			$query->execute();
		} else {
			$query->bindValue(':userid', $userID);
			$query->bindValue(':value', 0);
			$query->execute();	
		}
	}
	
	public function updateUser($id, $firstName, $lastName, $login, $password) {
		if($password == "") {
			$query = $this->pdo->prepare('UPDATE user SET usrlog =:login, usrnom =:lastname, usrpre =:firstname WHERE id =:id');
			$query->bindValue(':login', $login);
			$query->bindValue(':lastname', $lastName);
			$query->bindValue(':firstname', $firstName);
			$query->bindValue(':id', $id);
			$query->execute();
		} else { // password will be changed
			$query = $this->pdo->prepare('UPDATE user SET usrlog =:login, usrnom =:lastname, usrpre =:firstname, usrpwd =:password WHERE id =:id');
			$query->bindValue(':login', $login);
			$query->bindValue(':lastname', $lastName);
			$query->bindValue(':firstname', $firstName);
			$query->bindValue(':password', $password);
			$query->bindValue(':id', $id);
			$query->execute();
		}
	}
	
	public function getUserList() {
		$results = array();
		$query = $this->pdo->prepare('SELECT * FROM user ORDER BY usrlog');
		$query->execute();
		while($user = $query->fetch(PDO::FETCH_OBJ)) {
			$u = new User($user->id, $user->usrnom, $user->usrpre, $user->usrlog, $user->usrpwd, $user->usrloc);
			$results[] = $u;
		}
		$query->closeCursor();
		return $results;
	}

	public function getServerListByUser($id) {
		$results = array();
		$query = $this->pdo->prepare('SELECT * FROM server_user WHERE user_id =:id');
		$query->bindValue(':id', $id);
		$query->execute();
		while($server = $query->fetch(PDO::FETCH_OBJ)) {
			$query2 = $this->pdo->query('SELECT * FROM server WHERE id='.$server->server_id);
			$query2->execute();
			$s = $query2->fetch(PDO::FETCH_OBJ);
			$serv = new Server($s->id, $s->srvnom, $s->srvip, $s->srvpor, $s->srvptc, $s->srvca);
			$results[] = $serv;
		}
		$query->closeCursor();
		return $results;
	}
	
	public function addServerToUser($userId, $serverId) {
		$query = $this->pdo->prepare('INSERT INTO server_user(server_id, user_id) VALUES (:serverid, :userid)');
		$query->bindValue(':serverid', $serverId);
		$query->bindValue(':userid', $userId);
		if($query->execute()) {
			return $this->pdo->lastInsertId();
		} else {
			return 0;
		}
	}
	
	public function deleteServerFromUser($userId, $serverId) {
		$query = $this->pdo->prepare('DELETE FROM server_user WHERE user_id =:userid AND server_id =:serverid');
		$query->bindValue(':userid', $userId);
		$query->bindValue(':serverid', $serverId);
		$query->execute();
	}
	
	public function verifServerAlreadyAdd($serverId, $userId) {
		$i = 0;
		$query = $this->pdo->prepare('SELECT * FROM server_user WHERE server_id =:serverid AND user_id =:userid');
		$query->bindValue(':serverid', $serverId);
		$query->bindValue(':userid', $userId);
		$query->execute();
		if($query->rowCount() > 0) {
			return 0;
		} else {
			return 1;
		}
	}
	
	public function deleteUser($userID) {
		$query = $this->pdo->prepare("DELETE FROM user WHERE id = :userid");
		$query->bindValue(':userid', $userID);
		$query->execute();
	}
}
?>