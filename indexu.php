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
	</div>

	<div class="col-3 lightblue" id="pseudo" style="background-color: lightblue; height: 100vh"></div></div>

	<footer class="lightblue"> <input class="lightblue" id="inputfoot" type="text"> <button id="buttonfoot">valider</button></footer>

	<script>
		recupChat()

		function recupChat(){
			$.ajax({
				url:'http://messenger.api.niamor.com/createUser',
				method:'post'				
			}).done(afficheChat);
		}
		function afficheChat(msg){
			for (var i = 0; i != msg.length - 1; i++) {
				console.log(msg[i]);
			}


			
		}
	</script>
</body>
</html>