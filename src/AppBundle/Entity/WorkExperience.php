<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WorkExperienceRepository")
 * @ORM\Table(name="workexperience",options={"comment":"工作经历"})
 */
class WorkExperience
{

    /**
     * @ORM\ManyToOne(targetEntity="Employee",inversedBy="workexperiences")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $employee;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(length=255,options={"comment":"公司名"})
     */
    private $company;

    /**
     * @ORM\Column(type="date",name="begin_date",options={"comment":"开始时间"})
     */
    private $beginDate;

    /**
     * @ORM\Column(type="date",name="end_date" ,options={"comment":"离职时间"})
     */
    private $endDate;

    /**
     * @ORM\Column(length=255,options={"comment":"证明人"})
     */
    private $witness;

    /**
     * @ORM\Column(length=20,options={"comment":"证明人电话"})
     */
    private $witness_phone;

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
     * Set company
     *
     * @param string $company
     * @return WorkExperience
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set begin_date
     *
     * @param \DateTime $beginDate
     * @return WorkExperience
     */
    public function setBeginDate($beginDate)
    {
        $this->begin_date = $beginDate;

        return $this;
    }

    /**
     * Get begin_date
     *
     * @return \DateTime
     */
    public function getBeginDate()
    {
        return $this->begin_date;
    }

    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return WorkExperience
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set witness
     *
     * @param string $witness
     * @return WorkExperience
     */
    public function setWitness($witness)
    {
        $this->witness = $witness;

        return $this;
    }

    /**
     * Get witness
     *
     * @return string
     */
    public function getWitness()
    {
        return $this->witness;
    }

    /**
     * Set witness_phone
     *
     * @param string $witnessPhone
     * @return WorkExperience
     */
    public function setWitnessPhone($witnessPhone)
    {
        $this->witness_phone = $witnessPhone;

        return $this;
    }

    /**
     * Get witness_phone
     *
     * @return string
     */
    public function getWitnessPhone()
    {
        return $this->witness_phone;
    }

    /**
     * Set employee
     *
     * @param \AppBundle\Entity\Employee $employee
     * @return WorkExperience
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
