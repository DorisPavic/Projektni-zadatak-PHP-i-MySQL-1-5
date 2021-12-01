<?php

if (isset($action) && $action != '') {
    $query  = 'SELECT * FROM news';
    $query .= " WHERE id=" .$_GET['action'];
    $MySQL =NULL;
    $result = @mysqli_query( $conn, $query);
    $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
    print '
			<div class="news">
				<img src="' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
				<h2>' . $row['title'] . '</h2>
				<p>'  . $row['description'] . '</p>
				<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
				<hr>
			</div>';
}
else {
    print '<h1>News</h1><hr>';
    $query  = 'SELECT * FROM news';
    $query .= " WHERE archive='N'";
    $query .= " ORDER BY date DESC";
    $result = @mysqli_query($MySQL, $query);
    while($row = @mysqli_fetch_array($result)) {
        print '
			<div class="news">
			<div class="grid-child-element">
				<img src="' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
			</div>
			<div class="grid-child-element" style="padding: 0px 40px; text-align: justify">
			<h2 style="text-align: left">' . $row['title'] . '</h2>
				';
        if(strlen($row['description']) > 300) {
            echo substr(strip_tags($row['description']), 0, 300);
        } else {
            echo strip_tags($row['description']);
        }
        print '
			<br>
			<br>
			<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
			</div>
				<hr>
			</div>';
    }
}
?>