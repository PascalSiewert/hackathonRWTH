<?php
  require_once 'vendor/autoload.php';

  use ZalandoPHP\ZalandoPHP;
  use ZalandoPHP\Configuration\GenericConfiguration;
  use ZalandoPHP\Operations\Articles;
  use ZalandoPHP\Operations\Filters;
  use ZalandoPHP\Operations\Facets;
  use Wambosoft\Article;

  header('Content-Type: application/json');

  $options = array();

  if(isset($_GET)) {
    if(isset($_GET['pagesize'])) {
      $options['pageSize'] = intval($_GET['pagesize']);
    }

    if(isset($_GET['cat'])) {
      $options['cat'] = $_GET['cat'];
    }
  }

  echo json_encode(getArticles($options));

function getArticles($options = null) {
  $conf = new GenericConfiguration();

  try {
      $conf
          ->setLocale('de-DE')
          ->setClientName('hackathon-rwth')
          ->setResponseType('array');
  } catch (\Exception $e) {
      echo $e->getMessage();
  }

  $zalandoPHP = new ZalandoPHP($conf);
  $articles = new Articles();

  $allArticles = $zalandoPHP->runOperation($articles);



  //echo print_r($allArticles, true);

  if(!is_null($options) && count($options) > 0) {
    if(isset($options['color'])) {
      $articles->setColor($options['color']);
    }
    if(isset($options['brand'])) {
      $articles->setBrand($options['brand']);
    }
    if(isset($options['page'])) {
      $articles->setPage($options['page']);
    }
    if(isset($options['pageSize'])) {
      $articles->setPageSize($options['pageSize']);
    }

    $allArticles = $zalandoPHP->runOperation($articles);

    if(isset($options['cat'])) {

      $filteredArticles = array();
      $filteredArticles['content'] = array();
      for($i = 0; $i < count($allArticles['content']); $i++)
      {
        foreach($allArticles['content'][$i]['categoryKeys'] as $element) {
          if(strpos($element, $options['cat'])) {
            array_push($filteredArticles['content'], $allArticles['content'][$i]);
            break;
          }
        }
      }

      $allArticles = $filteredArticles;
    }
  }

  return $allArticles;
}
?>
