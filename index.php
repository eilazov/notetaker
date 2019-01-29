<?php  

session_start();
ob_start();

require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/notes.php');
require('controllers/users.php');

require('models/note.php');
require('models/user.php');


$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();

if($controller){
	$controller->executeAction();
}

?>
