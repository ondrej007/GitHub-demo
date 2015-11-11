<?php

// view search form
$latte->render($tplDir.'/search_form.latte');

// get search results 
if (!empty($_POST['username'])) {
  $userName = trim($_POST['username']);

  $tplSearch = array("username" => $userName);
  
  // get IP
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
      $ip = $_SERVER['REMOTE_ADDR'];
  }

  // add search history record
  $insertSearchRecord = $pdo->prepare("INSERT INTO search_history (phrase, ip) VALUES (:phrase, :ip)");
  $insertSearchRecord->execute(array("phrase" => $userName, "ip" => $ip));  

  // get Git user
  $gitClient = new \Github\Client();

  $userExist = true;
  try {
    $gitUser = $gitClient->api('user')->show($userName);
  } catch (\RuntimeException $e) {
      // just simple translation of the most common error
      $message = $e->getCode() == 404 ? "uživatel neexistuje." : $e->getMessage(); 
      $tplSearch['flashes'][] = "Chyba: ".$message;
      $userExist = false;
  }
   
  if ($userExist) {
    $tplSearch['userUrl'] = $gitUser['html_url'];

    // get reposities     
    $response = $gitClient->getHttpClient()->get('users/'.rawurlencode($userName).'/repos', array(
                'visibility' => 'public',
                'affiliation' => 'owner',
                'type' => 'owner',
                'sort' => 'created_at',
                'direction' => 'desc'));
    $gitRepo = Github\HttpClient\Message\ResponseMediator::getContent($response);

    $gitRepoCount = count($gitRepo);
    
    if ($gitRepoCount == 0) {
      $tplSearch['flashes'][] = "Nenalezen žádný veřejný repozitář.";
    } else {
      $tplSearch['flashes'][] = "Nalezeno $gitRepoCount repozitářů.";

      $tplSearch['repos'] = $gitRepo; 
    }
  }
  
  $latte->render($tplDir.'/search_result.latte',$tplSearch);
}
?>