<?php

// get items count for paginator
$recsCount = $pdo->query("SELECT COUNT(id) AS count FROM search_history");
$countResult = $recsCount->fetch(PDO::FETCH_ASSOC);

$totalItems = $countResult["count"];

if (!$totalItems) {
  $tplHistoryView['flashes'][0] = "Nenalezeny žádné záznamy o vyhledávání.";
} else {
  $totalPerPage = 10;
  
  $pagePattern = 'p=(:num)';
  $paginator = (new Voodoo\Paginator($pagePattern))
                ->setItems($totalItems, $totalPerPage)
                ->setPrevNextTitle("&lt;",  "&gt;")
                ->setFirstLastTitle("&lt;&lt;", "&gt;&gt;");
  
  $limit = $paginator->getPerPage();
  $offset = $paginator->getStart();
  
  $getHistory = $pdo->query("SELECT * FROM search_history ORDER BY search_datetime DESC LIMIT $limit OFFSET $offset");
  
  $tplHistoryView['records'] = $getHistory->fetchAll();
  $tplHistoryView['paginator'] = $paginator;
}

$latte->render($tplDir.'/history_view.latte',$tplHistoryView);

?>