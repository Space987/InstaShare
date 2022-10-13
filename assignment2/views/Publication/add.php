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
		<title>Add Publication</title>

		<style>

			body{
					background-color:#FDF5E6;
				}

    		h1{
    			font-size: 30px;
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 15%;
    			width: 100%;
    		}

    		.form-group1{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 57%;
			    margin-left: 35%;
    			width: 300px;
    		}

    		.labelP{
    			margin-left: 55%;
    		}


    		.form-group2{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 27%;
    			width: 100%;
    		}

    		#caption{
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
			    top: 43%;
    			width: 100%;
    		}

    		#date_time{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    margin-top: 10px;
			    margin-left: 36%;
    			width: 400px;
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
			    margin-top: 40%;
			    margin-left: 43%;
    			width: 230px;
    		}

    		#backBtn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 44%;
			    position: absolute;
			    margin-top: 45%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}	

    		#profile_pic_preview{
			    margin-left: 40%;
			    position: absolute;
			    margin-top: 12%;
			    width: 200px;
			    height: 100px;
    		}

    		a:hover{
    			text-decoration: none;
    		}

		</style>
	</head>
	<body>
		<?php
			if(isset($_GET['error'])){ ?>
				<div class="alert alert-danger alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<?= $_GET['error'] ?>
				</div>
		<?php  }
			if(isset($_GET['message'])){ ?>
				<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<?= $_GET['message'] ?>
				</div>
		<?php  }
		?>
		
		<h1>Create your Publication</h1>

		<form action='' method='post' enctype="multipart/form-data">
			<div class="form-group1">
				<label class="labelP">Picture</label>
				<input type="file" name="profile_pic" id="profile_pic" />
    			<img id='profile_pic_preview' src='/images/blank.jpg' style="max-width:200px;max-height:200px"/><br>
  			</div>
  			<div class="form-group2">
    			<label for="caption">Caption</label>
    			<input type="text" class="form-control" id="caption" name='caption'>
			</div>
			<div class="form-group3">
				<label for="date_time">Date and Time</label>
    			<input type="datetime-local" class="form-control" id="date_time" name='date_time'>
			</div>
  			<button type="submit" name="action" class="btn btn-primary">Add a new Publication</button>
		</form> 
		<a id="backBtn" href='/Publication/index'>Back</a>
		<script>
			profile_pic.onchange = evt => {
		  		const [file] = profile_pic.files
		  	if (file) {
		    	profile_pic_preview.src = URL.createObjectURL(file)
		 	 	}
			}
		</script>
		 
	</body>
</html>