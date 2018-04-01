<?php
/**
 * Created by PhpStorm.
 * User: pauldossantos
 * Date: 31/03/2018
 * Time: 12:07
 */

namespace Eoras\Controller;


use mysqli;
use Twig_Environment;
use Twig_Loader_Filesystem;

class Controller
{
    protected $twig;
    protected $msqli;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new Twig_Environment($loader, []);
    }

    public function checkAdmin()
    {
        $admin = [];

        if(isset($_SESSION['admin']) && $_SESSION['admin']['authorized'] == true) {
                $admin['authorized'] = true;
                $admin['pseudo'] = $_SESSION['admin']['pseudo'];
                return $admin;
        } else {
            $admin['authorized'] = false;
            $admin['pseudo'] = 'unknown';
            return $admin;
        }
    }
}
