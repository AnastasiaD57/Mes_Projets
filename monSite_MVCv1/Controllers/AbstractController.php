<?php

class AbstractController{
  protected function render(string $page, array $data = []) : void{
    require_once __DIR__ . "/../Vues/header.php";
    require_once __DIR__ . "/../Vues/$page.php";
    require_once __DIR__ . "/../Vues/footer.php";
  }
}

?>