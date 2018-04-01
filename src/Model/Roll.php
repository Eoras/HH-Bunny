<?php
/**
 * Created by PhpStorm.
 * User: pauldossantos
 * Date: 31/03/2018
 * Time: 21:03
 */

namespace Eoras\Model;


class Roll
{

    /* ********** ATTRIBUTS ********** */
    private $id;
    private $dateRoll;
    private $dateRaid;
    private $numberMin;
    private $numberMax;
    private $roll;
    private $peopleWhoRolled;
    private $broochFor;
    private $whoGetBrooch;

    /* ********** GETTERS / SETTERS ********** */

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDateRoll()
    {
        return $this->dateRoll;
    }

    /**
     * @return Roll
     */
    public function setDateRoll()
    {
        $dateRoll = (new \DateTime("now"))->format("Y-m-d H:i:s");
        $this->dateRoll = $dateRoll;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateRaid()
    {
        return $this->dateRaid;
    }

    /**
     * @param string $dateRaid
     * @return Roll
     */
    public function setDateRaid($dateRaid)
    {
        $date = (new \DateTime($dateRaid))->format("Y-m-d H:i:s");
        $this->dateRaid = $date;
        return $this;
    }

    /**
     * @return integer
     */
    public function getNumberMin()
    {
        return $this->numberMin;
    }

    /**
     * @param int $numberMin
     * @return Roll
     */
    public function setNumberMin(int $numberMin)
    {
        $this->numberMin = (int)($numberMin);
        return $this;
    }

    /**
     * @return integer
     */
    public function getNumberMax()
    {
        return $this->numberMax;
    }

    /**
     * @param int $numberMax
     * @return Roll
     */
    public function setNumberMax(int $numberMax)
    {
        $this->numberMax = (int)($numberMax);
        return $this;
    }

    /**
     * @return float
     */
    public function getRoll()
    {
        return $this->roll;
    }

    /**
     * @param int $numberMin
     * @param int $numberMax
     * @return Roll
     */
    public function setRoll($numberMin, $numberMax)
    {
        $roll = (float)(rand($numberMin, $numberMax).".".rand(0,9).rand(0,9));
        $this->roll = $roll;
        return $this;
    }

    /**
     * @return string
     */
    public function getPeopleWhoRolled()
    {
        return $this->peopleWhoRolled;
    }

    /**
     * @param string $peopleWhoRolled
     * @return Roll
     */
    public function setPeopleWhoRolled($peopleWhoRolled)
    {
        $this->peopleWhoRolled = $peopleWhoRolled;
        return $this;
    }

    /**
     * @return string
     */
    public function getBroochFor()
    {
        return $this->broochFor;
    }

    /**
     * @param string $broochFor
     * @return Roll
     */
    public function setBroochFor($broochFor)
    {
        $this->broochFor = $broochFor;
        return $this;
    }

    /**
     * @return string
     */
    public function getWhoGetBrooch()
    {
        return $this->whoGetBrooch;
    }

    /**
     * @param string $whoGetBrooch
     * @return Roll
     */
    public function setWhoGetBrooch($whoGetBrooch)
    {
        $this->whoGetBrooch = $whoGetBrooch;
        return $this;
    }
}
