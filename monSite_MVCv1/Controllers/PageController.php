<?php

class PageController extends AbstractController{

  public function accueil() : void {

    $data = [];
    $data["title"] = "Accueil";
    $data["h1"] = "Nos derniers articles";

    $images = [];
    for($i = 1; $i < 4; $i++){
      $images[] = "https://source.unsplash.com/random/1500x500?v$i";
    }

    $data["diapositives"] = $images;


    $images2 = [];
    for($i = 1; $i < 9; $i++){
      if($i == 5){
        $images2[] = "https://source.unsplash.com/random/1500x500?v10"; // l'image random v5 et v9 ne charge pas
      }else{
        $images2[] = "https://source.unsplash.com/random/1500x500?v$i";
      }
    }
    $data["cards"] = $images2;
    $this->render("accueil", $data);
  }

  public function service() : void{
    // avant le render => stocker toutes les valeurs dont j'ai besoin ici
    $data = [];
    $data["title"]= "service";
    $data["h1"]= "Nos services";

    $this->render("service",$data);
  }

  public function connexion() : void{
    // avant le render => stocker toutes les valeurs dont j'ai besoin ici
    $data = [];
    $data["title"]= "connexion";
    $data["h1"]= "Accéder à l'espace de gestion";

    $this->render("connexion",$data);
  }

}



?>