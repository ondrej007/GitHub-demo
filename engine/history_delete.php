<?php

$tplHistoryDelete = array();

if ($_POST['process']) {
  $dataOk = true;

  if (!is_numeric($_POST['hours'])) {
    $tplHistoryDelete['flashes'][] = "Chyba: počet hodin musí být číslo.";
    $dataOk = false;  
  }
  
  if ($_POST['pass'] != $deletePassword) {
    $tplHistoryDelete['flashes'][] = "Chyba: nesprávné heslo.";
    $dataOk = false;  
  }
  
  if ($dataOk) {
    $deleteRecords = $pdo->prepare("DELETE FROM search_history WHERE search_datetime + INTERVAL :hours HOUR < NOW()");
    $deleteRecords->execute(array("hours" => $_POST['hours']));
    
    $deletedRows = $deleteRecords->rowCount();
    
    if ($deletedRows > 0) {
      $tplHistoryDelete['flashes'][] = "Smazáno $deletedRows záznamů.";
    } else {
      $tplHistoryDelete['flashes'][] = "Intervalu nevyhovuje žádný záznam.";
    }  
  }
}

$latte->render($tplDir.'/history_delete.latte',$tplHistoryDelete);

?>