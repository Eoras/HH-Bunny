<?php
/**
 * Created by PhpStorm.
 * User: pauldossantos
 * Date: 31/03/2018
 * Time: 12:11
 */

namespace Eoras\Controller;


use DateTime;
use Eoras\Model\Roll;
use Eoras\Model\RollManager;

class RollController extends Controller
{

    public function showAll()
    {
        $manager = new RollManager();
        $rolls = $manager->showAll();
        return $this->twig->render('Roll/showAll.html.twig', [
            'rolls' => $rolls,
            'admin' => $this->checkAdmin()
        ]);
    }


    public function newRoll()
    {
        if($this->checkAdmin()["authorized"] == false) {
            header ('location: .');
            exit();
        }

        $roll = new Roll();
        $messages = [];

        if(!empty($_POST)) {
            if(empty($_POST['dateRaid'])) $messages['error']['dateRaid'] = "Vous devez ajouter une date de raid";
            if(empty($_POST['numberMax']) || $_POST['numberMax'] < 1) $messages['error']['numberMax'] = "Vous devez ajouter un nombre MAX > 1";
            if(empty($_POST['peopleWhoRolled'])) $messages['error']['peopleWhoRolled'] = "Sélectionnez une personne";

            if(!empty($_POST['dateRaid'])) {
                $roll->setDateRaid($_POST['dateRaid']);
            }

            if(!empty($_POST['numberMin']) OR $_POST['numberMin'] == 0 ) {
                $number = intval($_POST['numberMin']);
                $roll->setNumberMin($number);
            }
            if(!empty($_POST['numberMax']) OR $_POST['numberMax'] == 0) {
                $number = intval($_POST['numberMax']);
                $roll->setNumberMax($number);
            }

            /* IF ALL IS GOOD: */
            if(!empty($_POST['peopleWhoRolled'])) {
                if($_POST['peopleWhoRolled'] === "Ohden" || $_POST['peopleWhoRolled'] == "Eöras") {
                    $roll->setPeopleWhoRolled($_POST['peopleWhoRolled']);
                } else {
                    $messages['error']['peopleWhoRolled'] = "Cette personne n'est pas dans la liste!";
                }
            }

            if(empty($messages)) {
                $roll->setDateRoll();
                $roll->setRoll($roll->getNumberMin(), $roll->getNumberMax());
                $rollManager = new RollManager();
                try {
                    $rollManager->add($roll);
                } catch (\Exception $e) {
                    die($e->getMessage());
                }
                header('location: ?r=showAll');
            }
        }

        return $this->twig->render('Roll/addRoll.html.twig', [
            'admin' => $this->checkAdmin(),
            'messages' => $messages,
            'roll' => $roll,
        ]);
    }

    public function deleteRoll() {
        if(isset($_POST['delete']) && $_POST['delete']) {
            $rollManager = new RollManager();
            if($roll = $rollManager->find($_POST['delete'])) {
                $rollManager->delete($roll);
                header('location: ?r=showAll');
            }
        } else {
            header('location: ?r=showAll');
            exit();
        }
    }
}
