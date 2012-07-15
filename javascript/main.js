function getServersList() {
	var data = $.ajax({ url: "ajax/get-servers-list.php", async: false }).responseText;
	$("#servers").html(data);
}

function addUserToServer(serverID, userID) {
	var data = $.ajax({ url: "ajax/add-user-to-server.php?serverid="+serverID+"&userid="+userID, async: false }).responseText;
	getUserListByServer(serverID);		
}

function getUserListByServer(serverID) {
	var data = $.ajax({ url: "ajax/get-users-list-by-server.php?serverid="+serverID, async: false }).responseText;
	$("#users-list").html(data);
}

function deleteUserFromServer(userID, serverID) {
	var data = $.ajax({ url: "ajax/delete-user-from-server.php?serverid="+serverID+"&userid="+userID, async: false }).responseText;
	getUserListByServer(serverID);	
}

function deleteServer(serverID) {
	if(confirm('Delete this news ?')) {
		var data = $.ajax({ url: "ajax/delete-server.php?serverid="+serverID, async: false }).responseText;
		getServersList();
	}
}

function getUsersList() {
	var data = $.ajax({ url: "ajax/get-users-list.php", async: false }).responseText;
	$("#users").html(data);
}

function deleteUser(userID) {
	if(confirm('Delete this user ?')) {
		var data = $.ajax({ url: "ajax/delete-users.php?userid="+userID, async: false }).responseText;
		getUsersList();
	}
}

function lockUser(userID) {
	var data = $.ajax({ url: "ajax/lock-users.php?userid="+userID, async: false }).responseText;
	getUsersList();	
}

function viewServerList(userID) {
	var data = $.ajax({ url: "ajax/view-servers-list.php?userid="+userID, async: false }).responseText;
	$("#popup-container").html(data);
	$("#popup-servers").dialog({ height: "auto", width: 500, resizable: false });
}

function displayDemo() {
	$("#demo").toggle();	
}
