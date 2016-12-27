<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="EduExperienceRepository")
 * @ORM\Table(name="eduexperience",options={"comment":"教育经历"})
 */
class EduExperience
{

    /**
     * @ORM\ManyToOne(targetEntity="Employee",inversedBy="eduexperiences")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $employee;

    /**
     * @ORM\ManyToOne(targetEntity="Education")
     * @ORM\JoinColumn(name="education_id", referencedColumnName="id")
     */
    private $education;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="school_name",type="string",length=255)
     */
    private $schoolName;

    /**
     * @ORM\Column(name="begin_date",type="date")
     */
    private $beginDate;

    /**
     * @ORM\Column(name="end_date",type="date")
     */
    private $endDate;

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
     * Set schoolName
     *
     * @param string $schoolName
     * @return EduExperience
     */
    public function setSchoolName($schoolName)
    {
        $this->schoolName = $schoolName;

        return $this;
    }

    /**
     * Get schoolName
     *
     * @return string
     */
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * Set beginDate
     *
     * @param \DateTime $beginDate
     * @return EduExperience
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    /**
     * Get beginDate
     *
     * @return \DateTime
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return EduExperience
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set employee
     *
     * @param \AppBundle\Entity\Employee $employee
     * @return EduExperience
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

    /**
     * Set education
     *
     * @param \AppBundle\Entity\Education $education
     * @return EduExperience
     */
    public function setEducation(\AppBundle\Entity\Education $education = null)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return \AppBundle\Entity\Education
     */
    public function getEducation()
    {
        return $this->education;
    }
}
