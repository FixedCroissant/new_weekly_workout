<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Workout
 *
 * @ORM\Table(name="workout")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WorkoutRepository")
 */
class Workout
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
     * @ORM\Column(name="workout_date",type="date")
     *
     */
    private $stuWorkoutDate;

    /**
     * @var string
     *
     * @ORM\Column(name="stu_first_name", type="string", length=255, nullable=true)
     */
    private $stuFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="stu_last_name", type="string", length=255, nullable=true)
     */
    private $stuLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="stu_unity_id", type="string", length=255, nullable=true)
     */
    private $stuUnityID;

    /**
     * @var integer
     *
     * @ORM\Column(name="pre_exercise_hr",type="integer",length=0,nullable=true)
     */
    private $preExerciseHR;

    /**
     * @var integer
     *
     * @ORM\Column(name="peak_exercise_hr",type="integer",length=0,nullable=true)
     */
    private $peakExerciseHR;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_exercise_hr",type="integer",length=0,nullable=true)
     */
    private $postExerciseHR;

    /**
     * @var integer
     *
     * @ORM\Column(name="pushup_number",type="integer",length=0,nullable=true)
     */
    private $pushups;

    /**
     * @var string
     *
     * @ORM\Column(name="pushup_type",type="string",length=255,nullable=true)
     */
    private $pushupType;

    /**
     * @var integer
     *
     * @ORM\Column(name="crunches_number",type="integer",length=0,nullable=true)
     */
    private $crunches;

    /**
     * @var string
     *
     * @ORM\Column(name="workout_type",type="string",length=255,nullable=true)
     */
    private $workoutType;

    /**
     * @var string
     *
     * @ORM\Column(name="workout_length",type="string",length=255,nullable=true)
     */
    private $workoutLength;


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
     * Set stuWorkoutDate
     *
     * @param \DateTime $stuWorkoutDate
     * @return Workout
     */
    public function setWorkoutDate($stuWorkoutDate)
    {
        $this->stuWorkoutDate = $stuWorkoutDate;

        return $this;
    }

    /**
     * Get stuWorkoutDate
     *
     * @return \DateTime 
     */
    public function getWorkoutDate()
    {
        return $this->stuWorkoutDate;
    }

    /**
     * Set stuFirstName
     *
     * @param string $stuFirstName
     * @return Workout
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
     * @return Workout
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
     * Set stuUnityID
     *
     * @param string $stuUnityID
     * @return Workout
     */
    public function setStuUnityID($stuUnityID)
    {
        $this->stuUnityID = $stuUnityID;

        return $this;
    }

    /**
     * Get stuUnityID
     *
     * @return string 
     */
    public function getStuUnityID()
    {
        return $this->stuUnityID;
    }

    /**
     * Set preExerciseHR
     *
     * @param integer $preExerciseHR
     * @return Workout
     */
    public function setPreExerciseHR($preExerciseHR)
    {
        $this->preExerciseHR = $preExerciseHR;

        return $this;
    }

    /**
     * Get preExerciseHR
     *
     * @return integer 
     */
    public function getPreExerciseHR()
    {
        return $this->preExerciseHR;
    }

    /**
     * Set peakExerciseHR
     *
     * @param integer $peakExerciseHR
     * @return Workout
     */
    public function setPeakExerciseHR($peakExerciseHR)
    {
        $this->peakExerciseHR = $peakExerciseHR;

        return $this;
    }

    /**
     * Get peakExerciseHR
     *
     * @return integer 
     */
    public function getPeakExerciseHR()
    {
        return $this->peakExerciseHR;
    }

    /**
     * Set postExerciseHR
     *
     * @param integer $postExerciseHR
     * @return Workout
     */
    public function setPostExerciseHR($postExerciseHR)
    {
        $this->postExerciseHR = $postExerciseHR;

        return $this;
    }

    /**
     * Get postExerciseHR
     *
     * @return integer 
     */
    public function getPostExerciseHR()
    {
        return $this->postExerciseHR;
    }

    /**
     * Set pushups
     *
     * @param integer $pushups
     * @return Workout
     */
    public function setPushupNumber($pushups)
    {
        $this->pushups = $pushups;

        return $this;
    }

    /**
     * Get pushups
     *
     * @return integer 
     */
    public function getPushupNumber()
    {
        return $this->pushups;
    }

    /**
     * Set pushupType
     *
     * @param string $pushupType
     * @return Workout
     */
    public function setPushupType($pushupType)
    {
        $this->pushupType = $pushupType;

        return $this;
    }

    /**
     * Get pushupType
     *
     * @return string 
     */
    public function getPushupType()
    {
        return $this->pushupType;
    }

    /**
     * Set crunches
     *
     * @param integer $crunches
     * @return Workout
     */
    public function setCrunchesNumber($crunches)
    {
        $this->crunches = $crunches;

        return $this;
    }

    /**
     * Get crunches
     *
     * @return integer 
     */
    public function getCrunchesNumber()
    {
        return $this->crunches;
    }

    /**
     * Set workoutType
     *
     * @param string $workoutType
     * @return Workout
     */
    public function setWorkoutType($workoutType)
    {
        $this->workoutType = $workoutType;

        return $this;
    }

    /**
     * Get workoutType
     *
     * @return string 
     */
    public function getWorkoutType()
    {
        return $this->workoutType;
    }

    /**
     * Set workoutLength
     *
     * @param string $workoutLength
     * @return Workout
     */
    public function setWorkoutLength($workoutLength)
    {
        $this->workoutLength = $workoutLength;

        return $this;
    }

    /**
     * Get workoutLength
     *
     * @return string 
     */
    public function getWorkoutLength()
    {
        return $this->workoutLength;
    }
}
