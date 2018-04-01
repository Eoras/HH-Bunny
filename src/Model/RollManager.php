<?php
/**
 * Created by PhpStorm.
 * User: pauldossantos
 * Date: 31/03/2018
 * Time: 21:10
 */

namespace Eoras\Model;

use PDO;

class RollManager extends EntityManager
{

    public function showAll()
    {
        $query = "SELECT * FROM roll ORDER BY dateRoll DESC";
        $statement = $this->pdoConnect->prepare($query);
        $statement->setFetchMode(PDO::FETCH_CLASS, Roll::class);
        $statement->execute();
        return $statement->fetchAll();
    }

    private $dateRoll;
    private $dateRaid;
    private $numberMin;
    private $numberMax;
    private $roll;
    private $peopleWhoRolled;
    private $broochFor;
    private $whoGetBrooch;

    public function add(Roll $roll)
    {
        $query = "INSERT INTO roll (dateRoll, dateRaid, numberMin, numberMax, roll, peopleWhoRolled) VALUES (:dateRoll, :dateRaid, :numberMin, :numberMax, :roll, :peopleWhoRolled)";
        $statement = $this->pdoConnect->prepare($query);
        $statement->bindValue(':dateRoll', $roll->getDateRoll(), PDO::PARAM_STR);
        $statement->bindValue(':dateRaid', $roll->getDateRaid(), PDO::PARAM_STR);
        $statement->bindValue(':numberMin', $roll->getNumberMin(), PDO::PARAM_INT);
        $statement->bindValue(':numberMax', $roll->getNumberMax(), PDO::PARAM_INT);
        $statement->bindValue(':roll', $roll->getRoll(), PDO::PARAM_STR);
        $statement->bindValue(':peopleWhoRolled', $roll->getPeopleWhoRolled(), PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(Roll $roll)
    {
        $query = "DELETE FROM roll WHERE id=:id";
        $statement = $this->pdoConnect->prepare($query);
        $statement->bindValue('id', $roll->getId(), PDO::PARAM_INT);
        $statement->execute();
    }

    public function find($id)
    {
        $req = "SELECT * FROM roll WHERE id=$id";
        $statement = $this->pdoConnect->prepare($req);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, Roll::class);
        return $statement->fetch();
    }
}