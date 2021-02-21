<?php
require_once("Controller.php");
?>
<?php
isset($_REQUEST["action"]) ? $action = $_REQUEST["action"] : $action = "";
Controller::dispatch();
