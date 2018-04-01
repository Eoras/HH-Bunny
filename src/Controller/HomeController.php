<?php
/**
 * Created by PhpStorm.
 * User: pauldossantos
 * Date: 31/03/2018
 * Time: 12:11
 */

namespace Eoras\Controller;


use Eoras\Model\RollManager;

class HomeController extends Controller
{

    public function home()
    {
        $manager = new RollManager();
        $rolls = $manager->showAll();
        return $this->twig->render('Home/accueil.html.twig', [
            'rolls' => $rolls,
            'admin' => $this->checkAdmin()
        ]);
    }
}