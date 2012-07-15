<?php 
require_once('AbstractPdoManager.class.php');

class PdoServerManager extends AbstractPdoManager {
	public function addServer($name, $address, $port, $protocol, $certificate) {
		$query = $this->pdo->prepare("INSERT INTO server(srvnom, srvip, srvpor, srvptc, srvca) VALUES (:name, :address, :port, :protocol, :certificate)");
		$query->bindValue(':name', $name);
		$query->bindValue(':address', $address);
		$query->bindValue(':port', $port);
		$query->bindValue(':protocol', $protocol);
		$query->bindValue(':certificate', $certificate);
		$query->execute();
	}
	
	public function updateServer($id, $name, $address, $port, $protocol, $certificate) {
		$query = $this->pdo->prepare('UPDATE server SET srvnom =:name, srvip =:address, srvpor =:port, srvptc =:protocol, srvca =:certificate WHERE id =:id');
		$query->bindValue(':name', $name);
		$query->bindValue(':address', $address);
		$query->bindValue(':port', $port);
		$query->bindValue(':protocol', $protocol);
		$query->bindValue(':certificate', $certificate);
		$query->bindValue(':id', $id);
		$query->execute();
	}
	
	public function getUserListByServer($id) {
		$results = array();
		$query = $this->pdo->prepare('SELECT * FROM server_user WHERE server_id =:id');
		$query->bindValue(':id', $id);
		$query->execute();
		while($user = $query->fetch(PDO::FETCH_OBJ)) {
			$query2 = $this->pdo->query('SELECT * FROM user WHERE id='.$user->user_id);
			$query2->execute();
			$u = $query2->fetch(PDO::FETCH_OBJ);
			$usr = new User($u->id, $u->usrnom, $u->usrpre, $u->usrlog, $u->usrpwd, $u->usrloc);
			$results[] = $usr;
		}
		$query->closeCursor();
		return $results;
	}
	
	public function getServerList() {
		$results = array();
		$query = $this->pdo->prepare('SELECT * FROM server ORDER BY srvnom');
		$query->execute();
		while($server = $query->fetch(PDO::FETCH_OBJ)) {
			$s = new Server($server->id, $server->srvnom, $server->srvip, $server->srvpor, $server->srvptc, $server->srvca);
			$results[] = $s;
		}
		$query->closeCursor();
		return $results;
	}
	
	public function findServerById($id) {
		$query = $this->pdo->prepare('SELECT * FROM server WHERE id =:id');
		$query->bindValue(':id', $id);
		$query->execute();
		$server = $query->fetch(PDO::FETCH_OBJ);
		return new Server($server->id, $server->srvnom, $server->srvip, $server->srvpor, $server->srvptc, $server->srvca);
	}
	
	public function addUserToServer($serverID, $userID) {
		if($this->verifUserAlreadyAdd($userID, $serverID) == 1) { 
			$query = $this->pdo->prepare('INSERT INTO server_user(server_id, user_id) VALUES (:serverid, :userid)');
			$query->bindValue(':serverid', $serverID);
			$query->bindValue(':userid', $userID);
			if($query->execute()) {
				return $this->pdo->lastInsertId();
			} else {
				return 0;
			}
		} else {
			exit;
		}
	}
	
	public function deleteServer($serverID) {
			$query = $this->pdo->prepare("DELETE FROM server WHERE id = :serverid");
			$query->bindValue(':serverid', $serverID);
			$query->execute();	
	}
	
	public function deleteUserFromServer($userID, $serverID) {
			$query = $this->pdo->prepare('DELETE FROM server_user WHERE server_id = :serverid AND user_id = :userid');
			$query->bindValue(':serverid', $serverID);
			$query->bindValue(':userid', $userID);
			$query->execute();
	}
	
	public function verifUserAlreadyAdd($userID, $serverID) {
		$i = 0;
		$query = $this->pdo->prepare('SELECT * FROM server_user WHERE server_id =:serverid AND user_id =:userid');
		$query->bindValue(':serverid', $serverID);
		$query->bindValue(':userid', $userID);
		$query->execute();
		if($query->rowCount() > 0) {
			return 0;
		} else {
			return 1;
		}
	}
}
?>