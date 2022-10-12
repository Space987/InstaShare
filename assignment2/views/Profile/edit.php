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

		<title>Edit Profile</title>

		<style>
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
			    top: 25%;
			    margin-left: 40%;
    			width: 300px;
    		}

    		#comment{
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
			    top: 40%;
    			width: 300px;
    			margin-left: 40%;
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
			    top: 55%;
    			width: 300px;
    			margin-left: 40%;
    		}

    		button{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    margin-top: 480px;
			    margin-left: 43%;
    			width: 230px;
    		}

    		#backBtn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 44%;
			    position: absolute;
			    margin-top: 34%;
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
		<h1>Edit your Profile</h1>
		<form action='' method='post'>
            <div class="form-group1">
                <label for="firstname">First Name</label>
                <input type='text' class='form-control' id='firstname' name='first_name' value='<?= $data['profile']->first_name ?>' /></div><br>

              <div class="form-group2">
                <label for="middlename">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name='middle_name'
                value="<?= $data['profile']->first_name ?>">
              </div>

              <div class="form-group3">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name='last_name'
                value="<?= $data['profile']->first_name ?>">
              </div><br>
              <br>
              <button type="submit" name='action' class="btn btn-primary">Save Changes</button>
              <br>
        </form>
		
		<a id="backBtn" href='/Publication/index'>Back</a>
	</body>
</html>