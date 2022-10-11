<html>
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
			<title>Main Page</title>

			<!--Font-Awesome CSS-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

			<style>
				table{
		    			font-family: "Times New Roman", Times, serif;
					    position: absolute;
					    text-align: center;
					    font-size: 19px;
					    margin-top: 10%;
					    margin-left: 45%;
		    		}

		    	th{
		    		font-size: 30px;
		    		font-weight: normal	;
		    		font-family: "Times New Roman", Times, serif;
		    	}

		    	a:hover{
	    			text-decoration: none;
	    		}

	    		.input-group{
	    			position: absolute;
				    margin-top: 20px;
				    margin-left: 42%;
	    		}

	    		button{
	    			width: 40px;
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

			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    			<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        			<ul class="navbar-nav ml-auto">
            			<?php if(isset($_SESSION['username'])){
            				echo '	<li class="nav-item">
                						<a class="nav-link" href ="/User/logout">Logout</a>
            						</li>
									<li class="nav-item">
				    					<a class="nav-link" href ="/Profile/edit/<?php{ $_SESSION["user_id"]};>?">My profile</a>
				  					</li>

				  					<li class="nav-item">
				    					<a class="nav-link" href ="/Publication/add">Create Publication</a>
				  					</li>';
            			}else{
            				echo '	<li class="nav-item">
                						<a class="nav-link" href ="/User/index">Login</a>
            						</li>
            						<li class="nav-item">
                						<a class="nav-link" href ="/User/register">Register</a>
            						</li>';
            			} ?>
           	        </ul>
    			</div>
			</nav>

			<div class="input-group">
			  <div class="form-outline">
			    <input type="text" id="searchbar" class="form-control" name="search" placeholder="Search" />
			  </div>
			  <button type="submit" name="action" onclick="window.location = '/Publication/search'" class="btn btn-primary">
			    <i class="fa fa-search"></i>
			  </button>
			</div>

			<table id="table">
				<tr><th>Publications</th></tr>
				
				<?php
					foreach($data as $item)
					{
						echo 	"<tr>
									<td type=action><br>	
										<a id='caption' href='/Publication/details/$item->publication_id'>$item->caption</a>
									</td>
								</tr>";
					}
				?>
			</table>
	</body>

</html>