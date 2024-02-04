<?php

$page = "";

if(isset($_GET["page"]) && !empty($_GET["page"])){
  $page = $_GET["page"];
}else{
  $page = "/";
}

require_once __DIR__ . "/Controllers/AbstractController.php";
require_once __DIR__ . "/Controllers/PageController.php";
require_once __DIR__ . "/Controllers/ErreurController.php";

$routes = [                     // liste les pages du site, pour garantir qu'on n'affiche que ces 3 pages, sinon renvoie une erreur
  "/"           => "accueil",
  "/service"    => "service",
  "/connexion"  => "connexion"
];

if(array_key_exists( $page , $routes)){
  $p = new PageController();
  $p->{$routes[$page]}();
} else {
  $e = new ErreurController();
  $e->erreur404();
}
