<?php
/**
 * Created by PhpStorm.
 * User: pauldossantos
 * Date: 31/03/2018
 * Time: 01:27
 */

use Eoras\Controller\AdminController;
use Eoras\Controller\HomeController;
use Eoras\Controller\RollController;

session_start();
require_once '../vendor/autoload.php';
require '../config.php';

// ADMIN CONNEXION
if (isset($_GET['admin']) && (in_array(strtolower($_GET['admin']), ADMINS))) {
    echo (new AdminController())->logInAdmin();
    exit();
} elseif (isset($_GET['admin'])) {
    header('location: .');
    exit();
}

// ROUTER
if (isset($_GET['r'])) {
    if ($_GET['r'] == "addRoll") {
        echo (new RollController())->newRoll();
        exit();
    }
    if ($_GET['r'] == "showAll") {
        echo (new RollController())->showAll();
        exit();
    }
    if ($_GET['r'] == "logoff") {
        echo (new AdminController())->logOffAdmin();
        exit();
    }
    if ($_GET['r'] == "delete") {
        echo (new RollController())->deleteRoll();
        exit();
    } else echo (new HomeController())->home();
} else echo (new HomeController())->home();
