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

		<title>Create Profile</title>

		<style>
			h1{
    			font-size: 30px;
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 20%;
    			width: 100%;
    		}

    		.form-group1{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 30%;
    			width: 100%;
    		}

    		#firstname{
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
			    top: 45%;
    			width: 100%;
    		}

    		#middlename{
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
			    top: 60%;
    			width: 100%;
    		}

    		#lastname{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    margin-top: 10px;
			    margin-left: 36%;
    			width: 400px;
    		}

    		button{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    margin-top: 500px;
			    margin-left: 40%;
    			width: 300px;
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

		<h1>Edit Your Profile</h1>
		<form action='' method='post'>
			<div class="form-group1">
    			<label for="firstname">First Name</label>
    			<input type='text' class='form-control' id='firstname' name='first_name' value='<?=$data->first_name ?>' /></div><br>

  			<div class="form-group2">
    			<label for="middlename">Middle Name</label>
    			<input type="text" class="form-control" id="middlename" name='middle_name'
    			value="<?=$data->middle_name ?>">
  			</div>

  			<div class="form-group3">
    			<label for="lastname">Last Name</label>
    			<input type="text" class="form-control" id="lastname" name='last_name'
    			value="<?=$data->last_name ?>">
  			</div><br>
  			<br>
  			<button type="submit" name='action' class="btn btn-primary">Save Changes</button>
  			<br>
		</form> 

			<table>
			<tr><th>Comment </th><th>Date/Time </th><th>Action </th></tr>
			<?php


					foreach($data['comment'] as $item)
					{
						if(//the user_id of the current session matches the user_id of the profile and the profile_id matches the publication profile_id. 
										){
						echo 	"<tr>
									<td>$item->comment</td>
									<td>$item->date_time</td>
									<td type=action>
										<a href='/Comment/edit/$item->comment_id'>Edit</a>
										<a href='/Comment/delete/$item->comment_id'> | Delete</a>
									</td><br>
								</tr>";
							} else{continue};
					}
			?>
		</table>



	</body>
</html>