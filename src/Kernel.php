<?php

namespace App\src;

use App\src\Controller\TwigController;

/**
 * Class Noyau Routeur 
 */
class Kernel extends TwigController
{
    public function start()
    {
        session_start();
        $params = []; 
        // Analyse de l'URL en la divisant par '/' 
        $params = explode("/", $_SERVER["PATH_INFO"]);
        // Vérification de l'existence et du contenu de la première partie de l'URL
        if (isset($params[1]) && !empty($params[1]) && $params[1] != $params[1] . '/ ') {
           // Construction du nom complet du contrôleur en fonction de la première partie de l'URL
            $controller = "\\App\\src\\Controller\\" . ucfirst($params[1]) . "Controller";

            // Détermination de la méthode à appeler et des données éventuelles
            $method = (isset($params[2])) ? $params[2] :  "index";
            $data = (isset($params[3])) ? intval($params[3]) :  "";

            
            $controllers = new $controller();
            if (method_exists($controllers, $method)) {
                (isset($data)) ? $controllers->$method($data) : $controllers->$method();
            } else {
                header("Location:/public/home");
            }
        } else {
            header("Location:/public/home");
        }
    }
}
