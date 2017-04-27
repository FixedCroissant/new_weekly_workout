<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HeartRate
 *
 * @ORM\Table(name="heart_rate")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HRCalculatorRepository")
 */
class HeartRate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="stu_first_name", type="string", length=200)
     */
    private $stuFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="stu_last_name", type="string", length=255)
     */
    private $stuLastName;

    /**
     * @var int
     *
     * @ORM\Column(name="emplid", type="integer")
     */
    private $emplid;

    /**
     * @var string
     *
     * @ORM\Column(name="stu_gender", type="string", length=15)
     */
    private $stuGender;

    /**
     * @var int
     *
     * @ORM\Column(name="stu_age", type="integer")
     */
    private $stuAge;

    /**
     * @var int
     *
     * @ORM\Column(name="stu_rest_heart_rate", type="integer", nullable=true)
     */
    private $stuRestHeartRate;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set stuFirstName
     *
     * @param string $stuFirstName
     * @return HeartRate
     */
    public function setStuFirstName($stuFirstName)
    {
        $this->stuFirstName = $stuFirstName;

        return $this;
    }

    /**
     * Get stuFirstName
     *
     * @return string 
     */
    public function getStuFirstName()
    {
        return $this->stuFirstName;
    }

    /**
     * Set stuLastName
     *
     * @param string $stuLastName
     * @return HeartRate
     */
    public function setStuLastName($stuLastName)
    {
        $this->stuLastName = $stuLastName;

        return $this;
    }

    /**
     * Get stuLastName
     *
     * @return string 
     */
    public function getStuLastName()
    {
        return $this->stuLastName;
    }

    /**
     * Set emplid
     *
     * @param integer $emplid
     * @return HeartRate
     */
    public function setEmplid($emplid)
    {
        $this->emplid = $emplid;

        return $this;
    }

    /**
     * Get emplid
     *
     * @return integer 
     */
    public function getEmplid()
    {
        return $this->emplid;
    }

    /**
     * Set stuGender
     *
     * @param string $stuGender
     * @return HeartRate
     */
    public function setStuGender($stuGender)
    {
        $this->stuGender = $stuGender;

        return $this;
    }

    /**
     * Get stuGender
     *
     * @return string 
     */
    public function getStuGender()
    {
        return $this->stuGender;
    }

    /**
     * Set stuAge
     *
     * @param integer $stuAge
     * @return HeartRate
     */
    public function setStuAge($stuAge)
    {
        $this->stuAge = $stuAge;

        return $this;
    }

    /**
     * Get stuAge
     *
     * @return integer 
     */
    public function getStuAge()
    {
        return $this->stuAge;
    }

    /**
     * Set stuRestHeartRate
     *
     * @param integer $stuRestHeartRate
     * @return HeartRate
     */
    public function setStuRestHeartRate($stuRestHeartRate)
    {
        $this->stuRestHeartRate = $stuRestHeartRate;

        return $this;
    }

    /**
     * Get stuRestHeartRate
     *
     * @return integer 
     */
    public function getStuRestHeartRate()
    {
        return $this->stuRestHeartRate;
    }
}
