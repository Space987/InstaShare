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
			body{
					background-color:#FDF5E6;
				}

    		h1{
    			font-size: 30px;
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 10%;
    			width: 100%;
    		}

    		p{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    font-size: 20px;
			    margin-top: 120px;
			    margin-left: 40%;
    			width: 300px;
    		}

    		table{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    font-size: 19px;
			    margin-top: 30%;
			    margin-left: 25%;
    			width: 700px;
    		}

    		#backBtn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 65%;
			    position: absolute;
			    margin-top: 25%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}	

    		#addBtn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 53%;
			    position: absolute;
			    margin-top: 25%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}

    		#deletePub{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 40%;
			    position: absolute;
			    margin-top: 25%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}

    		#editPub{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 27%;
			    position: absolute;
			    margin-top: 25%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}

    		a:hover{
    			text-decoration: none;
    		}

    		img{
			    margin-left: 40%;
			    position: absolute;
			    margin-top: 12%;
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

		<h1><?= $data['publication']->caption ?></h1>
		
		<p><?= $data['publication']->date_time ?></p>
		

		<img src='/images/<?= $data['publication']->picture?>' style="max-width:300px;max-height:180px" id="profile_pic_preview" />

		<table>
			<tr><th>Profile ID</th><th>Comment </th><th>Date/Time </th><th>Action </th></tr>
			<?php
					foreach($data['comment'] as $item)
					{
						echo 	"<tr>
									<td>$item->profile_id</td>
									<td>$item->comment</td>
									<td>$item->date_time</td>
									<td type=action>
										<a href='/Comment/edit/$item->comment_id'>Edit</a>
										<a href='/Comment/delete/$item->comment_id'> | Delete</a>
									</td><br>
								</tr>";
					}
			?>
		</table>
		<a id="deletePub" href='/Publication/delete/<?= $data['publication']->publication_id ?>'>Delete Publication</a>
		<a id="editPub" href='/Publication/edit/<?= $data['publication']->publication_id ?>'>Edit Publication</a>
		
		<a id="addBtn" href='/Comment/add/<?= $data['publication']->publication_id ?>'>Add a Comment</a>
			
		<a id="backBtn" href='/Publication/index'>Back</a>	
		</body>
</html>