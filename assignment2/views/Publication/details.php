<!doctype html>
<html lang="en">
	
	<head>
		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap CSS --> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/
		bootstrap.min.css" integrity="sha384-Vkoo8×4CGsO3+Hhxv8T/
		Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>

		<title>Details for publication</title>

		<style>
    		h1{
    			font-size: 30px;
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 30%;
    			width: 100%;
    		}

    		p{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    font-size: 23px;
			    margin-top: 300px;
			    margin-left: 40%;
    			width: 300px;
    		}

    		button{
    			font-family: "Times New Roman", Times, serif;
			    text-align: center;
			    margin-top: 450px;
    			width: 300px;
    		}	

		</style>
	</head>

	<body>
		<h1><?= $data->caption ?><h1>
		
		<p><?= $data->date_time ?></p>
		<button type="button" class="btn btn-primary" onclick="history.go(-1)">Back</button>		
	</body>
</html>