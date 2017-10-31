<html>
<head>
	<title></title>
	<style type="text/css">
	body {
  font-family: sans-serif;
  font-size: 1em;
  color: #333;
  background-color: #ddd;
}

	#container{
		width: 50%;
		margin: 20px auto;
	}
	#link{

		background-color:#F9F8E4; /* when in focus */
		border:1px solid #97B5D2;
		color:#25313C;
		font-size:15px; /* This probably makes it "fat" as you want */
		width:50%;
		border-radius: 10px;
		margin:0;
		outline:0 none;
		padding:5px;
	}
	#btn{

		background-color:#d6181f; /* when in focus */
		width:20%;
		color:#ffffff;
		font-size:15px; /* This probably makes it "fat" as you want */
		border-radius: 10px;
		margin:0;
		outline:0 none;
		padding:5px;
	}
		
		
	</style>
</head>
<body>
<div id="container">
	<form action="welcome.php" method="post">
	Enter Event Link:&nbsp;&nbsp;<input id="link" type="text" name="link">&nbsp;&nbsp;<input type="submit" id="btn" value="SUBMIT">
	</form>
</div>

</body>
</html>