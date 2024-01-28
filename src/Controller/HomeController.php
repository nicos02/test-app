<?php  
namespace App\src\Controller;

class HomeController extends TwigController
{
   public function index()
   {
      echo $this->twig->render('home.html.twig', [
         'data' => 'Bienvenue sur le controller Home!'
      ]);
   }
}
?>