<?php
/**
 * Created by PhpStorm.
 * User: pauldossantos
 * Date: 31/03/2018
 * Time: 12:11
 */

namespace Eoras\Controller;


use Eoras\Model\RollManager;

class AdminController extends Controller
{

    public function logInAdmin()
    {
        $adminGetName = strtolower($_GET['admin']);
        $messages = [];

        // If we are already logged, redirect to homepage.
        if(isset($_SESSION['admin']) && $_SESSION['admin']['authorized'] == true) {
            header('location: .');
            exit();
        }

        // Check if password is right or wrong when POST.
        if(isset($_POST['password']) && $_POST['password'] == ADMINPSWD) {
            $_SESSION['admin']['authorized'] = true;
            $_SESSION['admin']['pseudo'] = ucfirst($adminGetName);
            header('location: ?r=showAll');
            exit();
        } elseif (isset($_POST['password']) && $_POST['password'] != ADMINPSWD) {
            $messages['error']['password'] = 'Wrong password, try again!';
        }

        return $this->twig->render('Admin/login.html.twig', [
            'messages' => $messages,
            'adminGetName' => $adminGetName,
            'admin' => $this->checkAdmin(),
        ]);
    }

    public function logOffAdmin()
    {
        session_destroy();
        header('location: .');
        exit();
    }
}
