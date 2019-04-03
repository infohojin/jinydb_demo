<?php
const DS = DIRECTORY_SEPARATOR;
const PS = PATH_SEPARATOR;

define("ROOT", ".");
$autoload = ROOT.DS."vendor".DS."autoload.php";
require_once $autoload;

echo "hello";
exit;
$pagenation = new \Jiny\Board\Pagenation(200);

echo $pagenation($_GET['limit']);

print_r($pagenation->pageArr($_GET['limit']));


/*
<ul class="pagination">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
*/