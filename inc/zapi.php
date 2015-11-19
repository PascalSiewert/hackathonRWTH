<?php
  require_once 'vendor/autoload.php';

  use ZalandoPHP\ZalandoPHP;
  use ZalandoPHP\Configuration\GenericConfiguration;
  use ZalandoPHP\Operations\Articles;
  use ZalandoPHP\Operations\Filters;
  use ZalandoPHP\Operations\Facets;

echo '<pre>';
print_r(getArticles(['kind' => 'hose']));
echo '</pre>';
//getArticles(['kind' => 'hose']);


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
      $articles->setPageSize(5);
    }

    $allArticles = $zalandoPHP->runOperation($articles);

    if(isset($options['kind'])) {

      $filteredArticles = array();
      for($i = 0; $i < count($allArticles['content']); $i++)
      {
        foreach($allArticles['content'][$i]['categoryKeys'] as $element) {
          if(strpos($element, $options['kind'])) {
            array_push($filteredArticles, $allArticles['content'][$i]);
          }
        }
      }

      return $filteredArticles;
    }
  }

  return $allArticles;
}
?>
