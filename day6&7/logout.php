<?php

session_start();

session_destroy();

echo "<p>You've been logged out. <a href='index.php'>Click here</a> to return to homepage.</p>";

?>