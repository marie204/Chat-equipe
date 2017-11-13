<!DOCTYPE html>
<html>
<head>
	<title> Chat-Equipe </title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="./jquery-3.2.1.min.js"></script>


</head>
<body class="lightblue">
	<div class="row" style="width: 100vh">
	<div class="col-9" id="chat" style="background-color: pink;">
		<button onclick="recupChatMsg();"> recup message</button>
	</div>

	<div class="col-3 lightblue" id="pseudo" style="background-color: lightblue; height: 100vh">
		<button onclick="getUsers();">Recup pseudo</button>
	</div></div>


	<footer class="lightblue"> <input class="lightblue" id="inputfoot" type="text"> <button id="buttonfoot" onclick="sendMessage();">valider</button></footer>

	<script>
		var userInfo;
		recupChat();
		

		function recupChat(){
			$.ajax({
				url:'http://messenger.api.niamor.com/createUser',
				method:'post'				
			}).done(saveUser);
		}
		function saveUser(user){
			userInfo = [user.id, user.authKey, user.username, user.createdAt, user.lastMessageAt];
			//console.log(userInfo);/*cause la mort du navigateur! for (var i = 0; i != msg.length - 1; i++) {console.log(msg[i]);}*/
		}
		function getUsers(){
			$.ajax({
				url:'http://messenger.api.niamor.com/getUsers', 
				method:'post', 
			}).done(affichePseudo)
		};
		function affichePseudo(otUsers){
			//a = otUsers.length;
			//02e2b95864c8a3e6b239e3871ad0b975
			for (var i = 0; i != otUsers.length; i++) {
				document.getElementById('pseudo').innerHTML +=  otUsers[i].username+ "<br>";
				//console.log(otUsers[i]);
			}
			//console.log(a);
		}

//userInfo[1]
		function recupChatMsg(){
			//console.log(userInfo[1])
			$.ajax({
				url:'http://messenger.api.niamor.com/getMessages', 
				method: 'post', 
				data: {
					authKey: userInfo[1],
					lastId : 0,
				}
				
			}).done(afficheMsg)
		}
		//console.log(userInfo);
		function afficheMsg(msgEnv){
			for (var i = 0; i <= msgEnv.length; i++) {
				console.log(msgEnv[i])
				document.getElementById('chat').innerHTML += msgEnv[i].from.username+":"+msgEnv[i].text+"<br>";
			}
		}
		function sendMessage(){
			a = document.getElementById('inputfoot').innerHTML;
			$.ajax({
				url:'http://messenger.api.niamor.com/sendMessage',
				method:'post',
				data:{
					authKey: userInfo[1],
					text: document.getElementById('inputfoot').value, 
					to: 0
				}
			}).done(clearValue)
		}
		function clearValue(){
			document.getElementById('inputfoot').value = '';
		}
	</script>
</body>
</html>