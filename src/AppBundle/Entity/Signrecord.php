<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SignrecordRepository")
 * @ORM\Table(name="signrecord",options={"comment":"打卡记录"})
 */
class Signrecord
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date",options={"comment":"打卡日期"})
     */
    private $sign_date;

    /**
     * @ORM\Column(type="time",options={"comment":"上班时间"})
     */
    private $sign_in_time;

    /**
     * @ORM\Column(type="time",options={"comment":"下班时间"})
     */
    private $sign_off_time;

    /**
     * @ORM\ManyToOne(targetEntity="Employee",inversedBy="signrecords")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $employee;

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
     * Set sign_date
     *
     * @param \DateTime $signDate
     * @return Signrecord
     */
    public function setSignDate($signDate)
    {
        $this->sign_date = $signDate;

        return $this;
    }

    /**
     * Get sign_date
     *
     * @return \DateTime
     */
    public function getSignDate()
    {
        return $this->sign_date;
    }

    /**
     * Set sign_in_time
     *
     * @param \DateTime $signInTime
     * @return Signrecord
     */
    public function setSignInTime($signInTime)
    {
        $this->sign_in_time = $signInTime;

        return $this;
    }

    /**
     * Get sign_in_time
     *
     * @return \DateTime
     */
    public function getSignInTime()
    {
        return $this->sign_in_time;
    }

    /**
     * Set sign_off_time
     *
     * @param \DateTime $signOffTime
     * @return Signrecord
     */
    public function setSignOffTime($signOffTime)
    {
        $this->sign_off_time = $signOffTime;

        return $this;
    }

    /**
     * Get sign_off_time
     *
     * @return \DateTime
     */
    public function getSignOffTime()
    {
        return $this->sign_off_time;
    }

    /**
     * Set employee
     *
     * @param \AppBundle\Entity\Employee $employee
     * @return Signrecord
     */
    public function setEmployee(\AppBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getEmployee()
    {
        return $this->employee;
    }
}
