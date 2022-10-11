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

		<title>Edit Publication</title>

		<style>
    		h1{
    			font-size: 30px;
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 25%;
    			width: 100%;
    		}

    		.form-group1{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 38%;
    			width: 100%;
    		}

    		#caption{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    margin-top: 10px;
			    margin-left: 36%;
    			width: 400px;
    		}

    		.form-group2{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 52%;
    			width: 100%;
    		}

    		#date_time{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    margin-top: 10px;
			    margin-left: 36%;
    			width: 400px;
    		}

    		.form-group3{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 68%;
    			width: 100%;
    		}

    		#profile_pic_preview{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 40%;
			    position: absolute;
			    top: 35px;
    			width: 300px;
    			text-align: center;
    		}

    		button{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    margin-top: 535px;
			    margin-left: 43%;
    			width: 230px;
    		}

    		#backBtn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 44%;
			    position: absolute;
			    margin-top: 38%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}	

    		a:hover{
    			text-decoration: none;
    		}

		</style>
	</head>

	<body>
		<h1>Edit your Publication</h1>
		<form action='' method='post' enctype="multipart/form-data">
			<div class="form-group1">
    			<label for="caption">Your caption</label>
    			<input type="text" class="form-control" id="caption" name='caption' value="<?= $data['publication']->caption ?>">
  			</div><br>

  			<div class="form-group2">
    			<label for="date_time">Date and Time of Publication	</label>
    			<input type="datetime-local" class="form-control" id="date_time" name='date_time' value="<?= $data['publication']->date_time ?>">
  			</div><br>
  			
  			<div class="form-group3">
    			<label for="profile_pic_preview">Your Image</label>
    			<input type="file" class="form-control" id="profile_pic_preview" name='profile_pic'>
  			</div><br>
  			<br>
  			<button type="submit" name='action' class="btn btn-primary">Save Changes</button>
  			<br>
		</form>
		
		<a id="backBtn" href='/Publication/details/<?= $data['publication']->publication_id ?>'>Back</a>
	</body>
</html>