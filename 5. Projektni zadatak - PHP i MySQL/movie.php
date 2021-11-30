<?php
print '
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="style.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <style>
		p {margin: 0.5em}
	  </style>
	</head>
	<body>
		<div class="movie"> </div>';

if (!isset($_POST['action']) || $_POST['action'] == '') { $_POST['action'] = FALSE; }

if ($_POST['action'] == FALSE) {
    print '

			  <title>Find movie on imdb </title>
			  
			  <form class="form-horizontal" action="" name="imdbsearch" method="POST">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="title">Name of the movie:*</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="title" placeholder="Write name of the movie..." name="title" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="title">Genre:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="genre" placeholder="Write genre of the movie..." name="genre" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="title">Actor:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="actors" placeholder="Write name of the actor..." name="actors">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="title">Director:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="director" placeholder="Write name of the director..." name="director">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="title">Country:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="country" placeholder="Write name of the director..." name="country">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="year">Year:</label>
				  <div class="col-sm-10">          
					<input type="number" class="form-control" id="year" placeholder="Write year of the movie..." name="year" pattern="[0-9]{4}">
				  </div>
				</div>
				<input type="hidden" name="action" value="TRUE">
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
				  <br>
					<button type="submit" class="btn btn-default">Search</button>
					<br>
				  </div>
				</div>
			  </form>';
}
else if ($_POST['action'] == TRUE) {
    print '
			
			<h1>SEARCH RESULT</h1>';

    $key = 'be5ea402';
    if ($_POST['year'] != '') { $url = 'http://www.omdbapi.com/?apikey='.$key.'&t=' . urlencode($_POST['title']) . '&y=' . urlencode($_POST['year']); }
    else { $url = 'http://www.omdbapi.com/?apikey='.$key.'&t=' . urlencode($_POST['title']); }
    $json = file_get_contents($url);
    $_data = json_decode($json,true);

    if (isset($_data['Title']) && $_data['Title'] != '') {
        print '
				<div class="result">				
				<div class="grid-child-element">
					<img src="' . $_data['Poster'] . '" alt="' . $_data['Title'] . '" >
					
				
				</div>
				<div class="grid-child-element">
		
					<p><strong style="color:#1c1f2c; font-size: 20px">Title:</strong> ' . $_data['Title'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Year:</strong> ' . $_data['Year'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Rated:</strong> ' . $_data['Rated'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Izdano:</strong> ' . $_data['Released'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Released:</strong> ' . $_data['Runtime'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Genre:</strong> ' . $_data['Genre'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Direktor:</strong> ' . $_data['Director'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Language:</strong> ' . $_data['Language'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Actors:</strong> ' . $_data['Actors'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Plot:</strong> ' . $_data['Plot'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Writer:</strong> ' . $_data['Writer'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Ratings:</strong> ' . $_data['Ratings'][0]['Source'] . ': ' . $_data['Ratings'][0]['Value'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Awards:</strong> ' . $_data['Awards'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Country:</strong> ' . $_data['Country'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">IMDB rating:</strong> ' . $_data['imdbRating'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Production:</strong> ' . $_data['Production'] . '</p>
					<p><strong style="color:#1c1f2c; font-size: 20px">Website:</strong> <a href="' . $_data['Website'] . '">' . $_data['Website'] . '</a></p>
				</div>
				</div>
				';
    }
    else {
        echo '<h1>Something is not working, try again</h1>';
    }
    echo '<p><strong style="color:#1c1f2c; font-size: 20px;"><a href="index.php?menu=11">Back</a></strong></p>';
}
print '
		</div>
	</body>
	      <footer>
         <hr>
         Copyright &copy; 2021 Doris Pavić. <a href="https://github.com/DorisPavic?tab=repositories"><img
               src="slike/github.png" title="Github" alt="Github" style="width:30px;width:15px"></a></p>
         </br>
      </footer>
</html>';
?>