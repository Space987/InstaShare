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

		<title>Add Comment</title>



	</head>

	<body>
		<h1>Add your caption</h1>
	<form action='' method='post' enctype="multipart/form-data">
			<div class="form-group1">
    			<label>Picture: <input type="file" name="profile_pic" id="profile_pic" /> </label>
    			<img id='profile_pic_preview' src='/images/blank.jpg' style="max-width:200px;max-height:200px"/><br>
  			</div><br>

  			<div class="form-group2">
    			<label for="date_time">Caption</label>
    			<input type="text" class="form-control" id="caption" name='caption'>
			<br>
    			<label for="date_time">Date and Time of caption	</label>
    			<input type="datetime-local" class="form-control" id="date_time" name='date_time'>
  			</div><br>
  			<br>
  			<input type="submit" name="action" value="Add new Publication" />
  			<br>
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