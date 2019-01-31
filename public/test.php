<?php
session_start();
$_SESSION['test'] = "session data";
echo 'ok';