<?php

require "./engine/init.php";

$pageList = array("search","history_view","history_delete");
$page = in_array($_REQUEST['page'], $pageList) ? $_REQUEST['page'] : "search";

$latte->render($tplDir.'/header.latte');
require "./engine/$page.php";
$latte->render($tplDir.'/footer.latte');

?>