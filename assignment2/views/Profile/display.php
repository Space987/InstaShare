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

		<title>View Profile</title>

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
    		img{
			     vertical-align: top;
    			 display: inline-block;
    			 text-align: center;
			     max-width:200px;
			     max-height:140px;
			     padding: 10px;

    		}

    		table{
		    			font-family: "Times New Roman", Times, serif;
					    position: absolute;
					    text-align: center;
					    font-size: 19px;
					    margin-top: 25%;
					    margin-left: 31%;
		    		}

		    th{
		    	font-size: 24px;
		    	font-weight: normal;
		    	font-family: "Times New Roman", Times, serif;
		    }

    		
    		#backBtn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 44%;
			    position: absolute;
			    margin-top: 19%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}

    		.fn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 33%;
			    position: absolute;
			    margin-top: 13%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}

    		.mn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 44%;
			    position: absolute;
			    margin-top: 13%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}
    		.ln{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 55%;
			    position: absolute;
			    margin-top: 13%;
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
		<h1>Profile</h1>
			<dl>
				<div class="fn">
				<dt>First Name</dt>
				<dd><?= $data['profile']->first_name ?></dd>
				</div>

				<div class="mn">
				<dt>Middle Name</dt>
				<dd><?= $data['profile']->middle_name ?></dd>
				</div>
				
				<div class="ln">
				<dt>Last Name</dt>
				<dd><?= $data['profile']->last_name ?></dd>
				</div>	
			</dl>

		<table id="table">
				<tr><th colspan="3">Publications</th></tr>
				
				<?php
				$counter = 0;


					foreach($data['publication'] as $item)

					{
						$counter++;
						$check = $counter%4;
								
						if($check != 0){
						echo 	"
		
							<td>
								<br><img src='/images/$item->picture'/>	<br>
								<a id='caption' href='/Publication/details/$item->publication_id'>$item->caption</a>
								</td>
								";
							}
							else{
							echo 	"	
							<tr> 
							
								</tr>
								<td>
								<br><img src='/images/$item->picture'/>	<br>
								<a id='caption' href='/Publication/details/$item->publication_id'>$item->caption</a>
								</td>
								"
								;
								$counter = 1;
					}
				}
				?>
			</table>
		
		<a id="backBtn" href='/Publication/index'>Back</a>
	</body>
</html>
</html>