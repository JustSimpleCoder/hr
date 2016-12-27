<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="HolidayRepository")
 * @ORM\Table(name="holiday")
 */
class Holiday
{

    /**
     * @ORM\OneToOne(targetEntity="Employee", inversedBy="holiday")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $employee;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="year_leave", type="smallint",options={"comment":"年假"})
     */
    private $yearLeave;

    /**
     * @ORM\Column(name="year_has", type="smallint",options={"comment":"剩余年假"})
     */
    private $yearHas;

    /**
     * @ORM\Column(name="marriage_leave", type="smallint",options={"comment":"婚期"})
     */
    private $marriageeave;

    /**
     * @ORM\Column(name="maternity_leave", type="smallint",options={"comment":"产假"})
     */
    private $maternityLeave;


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
     * Set yearLeave
     *
     * @param integer $yearLeave
     * @return Holiday
     */
    public function setYearLeave($yearLeave)
    {
        $this->yearLeave = $yearLeave;

        return $this;
    }

    /**
     * Get yearLeave
     *
     * @return integer 
     */
    public function getYearLeave()
    {
        return $this->yearLeave;
    }

    /**
     * Set yearHas
     *
     * @param integer $yearHas
     * @return Holiday
     */
    public function setYearHas($yearHas)
    {
        $this->yearHas = $yearHas;

        return $this;
    }

    /**
     * Get yearHas
     *
     * @return integer 
     */
    public function getYearHas()
    {
        return $this->yearHas;
    }

    /**
     * Set marriageeave
     *
     * @param integer $marriageeave
     * @return Holiday
     */
    public function setMarriageeave($marriageeave)
    {
        $this->marriageeave = $marriageeave;

        return $this;
    }

    /**
     * Get marriageeave
     *
     * @return integer 
     */
    public function getMarriageeave()
    {
        return $this->marriageeave;
    }

    /**
     * Set maternityLeave
     *
     * @param integer $maternityLeave
     * @return Holiday
     */
    public function setMaternityLeave($maternityLeave)
    {
        $this->maternityLeave = $maternityLeave;

        return $this;
    }

    /**
     * Get maternityLeave
     *
     * @return integer 
     */
    public function getMaternityLeave()
    {
        return $this->maternityLeave;
    }

    /**
     * Set employee
     *
     * @param \AppBundle\Entity\Employee $employee
     * @return Holiday
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
