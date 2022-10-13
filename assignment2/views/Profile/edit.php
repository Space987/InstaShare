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

				body{
					background-color:#FDF5E6;
				}

    		h1{
    			font-size: 30px;
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    margin-left: 30px;
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

    		table{
		    			font-family: "Times New Roman", Times, serif;
					    position: absolute;
					    text-align: center;
					    font-size: 19px;
		    		}

					 
				.column_1 {
				  float: left;
				  width: 50%;
				  padding-top: 600px;
				  padding-left: 100px;
				}

					.column_2 {
				  float: left;
				  width: 50%;
				  padding-top: 570px;
				  padding-left: 200px;
				}

				
				.row:after {
				  content: "";
				  display: table;
				  clear: both;
				}

		    th{
		    	font-size: 24px;
		    	font-weight: normal;
		    	font-family: "Times New Roman", Times, serif;
		    }

		    img{
			     vertical-align: top;
    			 display: inline-block;
    			 text-align: center;
			     max-width:200px;
			     max-height:140px;
			     padding: 10px;

    		}


    		button{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    margin-top: 482px;
			    margin-left: 43%;
    			width: 230px;
    		}

    		#backBtn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 44%;
			    position: absolute;
			    margin-top: 41%;
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
		<h1>Edit your Profile</h1>
		<form action='' method='post'>
            <div class="form-group1">
                <label for="first_name">First Name</label>
                <input type='text' class='form-control' id='first_name' name='first_name' value='<?=$data['profile']->first_name?>' /></div><br>

              <div class="form-group2">
                <label for="middle_nname">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name='middle_name' value="<?=$data['profile']->middle_name?>">
              </div>

              <div class="form-group3">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name='last_name' value="<?=$data['profile']->last_name?>">
              </div>
              <button type="submit" name='action' class="btn btn-primary">Save Changes</button>
              <br>

          	<a id="backBtn"  href='/Publication/index'>Back</a>
    </form>

 <div class="row">   
<div class="column_1">
    <table>
				<tr><th colspan="3"><b> My Publications </b> </th></tr>
				
				<?php
				$counter = 0;


					foreach($data['publication'] as $item)

					{
						$counter++;
						$check = $counter%4;
								
						if($check != 0){
						echo 	"
		
							<td>
								<br><img src='/images/$item->picture'/><br>
								<a id='caption' href='/Publication/details/$item->publication_id'>$item->caption</a>
								</td>
								";
							}
							else{
							echo 	"	
							<tr> 
							
								</tr>
								<td>
								<br><img src='/images/$item->picture'/><br>
								<a id='caption' href='/Publication/details/$item->publication_id'>$item->caption</a>
								</td>
								"
								;
								$counter = 1;
					}
				}
				?>
			</table>

	</div>

<div class="column_2">
<table>
				<tr><th colspan="3"><br> <b> Your Comments </b> </th></tr>
				<?php
					foreach($data['comment'] as $item)
					{
						echo 	"
								<tr>
									<td type=action><br>	
										<a id='caption' href='/Publication/details/$item->publication_id'>$item->comment</a>
									</td>
								</tr>";
					}
				?>

			</table>
			</div>
	</div>
		
	
	</body>
</html>