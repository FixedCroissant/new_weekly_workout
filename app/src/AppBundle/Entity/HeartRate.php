<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var int
     *
     * @ORM\Column(name="user_id",type="integer",nullable=false)
     *
     */
     private $userID;

    /**
     * @var string
     *
     * @ORM\Column(name="unityID",type="string",nullable=true)
     *
     */
    private $unityID;




    /**
     * @var string
     *
     * @ORM\Column(name="stu_gender", type="string", length=15)
     * @Assert\NotBlank()
     */
    private $stuGender;

    /**
     * @var int
     *
     * @ORM\Column(name="stu_age", type="integer")
     * @Assert\NotBlank()
     */
    private $stuAge;

    /**
     * @var int
     *
     * @ORM\Column(name="stu_rest_heart_rate", type="integer", nullable=true)
     * @Assert\NotBlank()
     *
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
     * Set userID
     *
     * @param integer $newUserID
     * @return HeartRate
     */
    public function setUserID($newUserID)
    {
        $this->userID = $newUserID;

        return $this;
    }

    /**
     * Get userID
     *
     * @return integer
     */
    public function getUserID()
    {
        return $this->userID;
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

    /**
     * Set unityID
     *
     * @param string $unityID
     * @return HeartRate
     */
    public function setUnityID($unityID)
    {
        $this->unityID = $unityID;

        return $this;
    }

    /**
     * Get unityID
     *
     * @return string 
     */
    public function getUnityID()
    {
        return $this->unityID;
    }
}
