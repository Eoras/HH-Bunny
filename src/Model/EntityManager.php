<?php
/**
 * Created by PhpStorm.
 * User: emlv
 * Date: 17/10/17
 * Time: 21:34
 */

namespace Eoras\Model;

use PDO;

class EntityManager
{

    protected $pdoConnect;

    public function __construct()
    {
        $this->pdoConnect = new PDO(DSN, USER, PASSWORD, [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }
}