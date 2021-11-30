<?php
if ($_SESSION['user']['valid'] == 'true') {
    if (!isset($action)) { $action = 1; }
    print '
		<h1>Adding news</h1>
		<div>';

    # Editor News
    include("user/news.php");
    print '
		</div>';
}
else {
    $_SESSION['message'] = '<p id="poruke">Please register or login using your credentials!</p>';
    header("Location: index.php?menu=7");
}
?>