<?php

#Add news
if (isset($_POST['_action_']) && $_POST['_action_'] == 'add_news') {
    $_SESSION['message'] = '';
    # htmlspecialchars — Convert special characters to HTML entities
    # http://php.net/manual/en/function.htmlspecialchars.php
    $query  = "INSERT INTO news (title, description, archive)";
    $query .= " VALUES ('" . htmlspecialchars($_POST['title'], ENT_QUOTES) . "', '" . htmlspecialchars($_POST['description'], ENT_QUOTES) . "', '" . $_POST['archive'] . "')";
    $result = @mysqli_query($MySQL, $query);

    $ID = mysqli_insert_id($MySQL);

    # picture
    if($_FILES['picture']['error'] == UPLOAD_ERR_OK && $_FILES['picture']['name'] != "") {

        # strtolower - Returns string with all alphabetic characters converted to lowercase.
        # strrchr - Find the last occurrence of a character in a string
        $ext = strtolower(strrchr($_FILES['picture']['name'], "."));

        $_picture = $ID . '-' . rand(1,100) . $ext;
        copy($_FILES['picture']['tmp_name'], "news/".$_picture);

        if ($ext == '.jpg' || $ext == '.png' || $ext == '.gif') { # test if format is picture
            $_query  = "UPDATE news SET picture='" . $_picture . "'";
            $_query .= " WHERE id=" . $ID . " LIMIT 1";
            $_result = @mysqli_query($MySQL, $_query);
            $_SESSION['message'] .= '<h2>You successfully added picture.</h2>';
        }
    }


    $_SESSION['message'] .= '<h2>You have successfully suggested new news!</h2>';

    # Redirect
    header("Location: index.php?menu=8&action=2");
}

#Show news info
if (isset($_GET['id']) && $_GET['id'] != '') {
    $query  = "SELECT * FROM news";
    $query .= " WHERE id=".$_GET['id'];
    $query .= " ORDER BY date DESC";
    $result = @mysqli_query($MySQL, $query);
    $row = @mysqli_fetch_array($result);
    print '
		<h2>News overview</h2>
		<div class="news">
			<img src="news/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
			<h2>' . $row['title'] . '</h2>
			' . $row['description'] . '
			<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
			<hr>
		</div>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
}

#Add news
else if (isset($_GET['add']) && $_GET['add'] != '') {

    print '
		<h2>Add news</h2>
		<form action="" id="news_form" name="news_form" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="add_news">
			
			<label for="title">Title *</label>
			<input type="text" id="title" name="title" placeholder="News title.." required>
			<label for="description">Description *</label>
			<textarea id="description" name="description" placeholder="News description.." required></textarea>
				
			<label for="picture">Picture</label>
			<input type="file" id="picture" name="picture">
						
			<label for="archive">Archive:</label><br />
            <input type="radio" name="archive" value="Y"> YES &nbsp;&nbsp;
			<input type="radio" name="archive" value="N" checked> NO
			
			<hr>
			
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
}

    print '
		<h2>News</h2>
		<div id="news">
			<table>
				<thead>
					<tr>
						<th width="16"></th>
						<th width="16"></th>
						<th>Title</th>
						<th>Description</th>
						<th>Date</th>
						<th width="16"></th>
					</tr>
				</thead>
				<tbody>';
    $query  = "SELECT * FROM news";
    $query .= " ORDER BY date DESC";
    $result = @mysqli_query($MySQL, $query);
    while($row = @mysqli_fetch_array($result)) {
        print '
					<tr>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['id']. '"><img src="gallery/user.png" alt="user"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><img src="gallery/edit.png" alt="uredi"></a></td>
						<td>' . $row['title'] . '</td>
						<td>';
        if(strlen($row['description']) > 160) {
            echo substr(strip_tags($row['description']), 0, 160).'...';
        } else {
            echo strip_tags($row['description']);
        }
        print '
						</td>
						<td>' . pickerDateToMysql($row['date']) . '</td>
						<td>';
        if ($row['archive'] == 'Y') { print '<img src="gallery/inactive.png" alt="" title="" />'; }
        else if ($row['archive'] == 'N') { print '<img src="gallery/active.png" alt="" title="" />'; }
        print '
						</td>
					</tr>';
    }
    print '
				</tbody>
			</table>
			<a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;add=true" class="AddLink">Add news</a>
		</div>';


# Close MySQL connection
@mysqli_close($MySQL);
?>