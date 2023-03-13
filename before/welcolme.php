<?php
session_start();

echo $_SESSION['login'];
echo"</br>";
echo $_SESSION['password'];

echo "<form method='POST' action='tommy.php'>";
echo "<input name='submit'  type='submit'>";
echo "</form>"

?>