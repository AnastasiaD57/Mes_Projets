<?php 

class ErreurController extends AbstractController{

    public function erreur404() :void {
        $data = [
            "h1" => "Page d'erreur 404",
            "title" => "page introuvable"
        ];
        $this->render("404", $data);
    }
}