<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="SalaryRepository")
 * @ORM\Table(name="salary",options={"comment":"薪水"})
 */
class Salary
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="float",options={"comment":"基本工资"})
     */
    private $base_money;

    /**
     * @ORM\Column(type="float",options={"comment":"岗位工资"})
     */
    private $position_money;

    /**
     * @ORM\OneToOne(targetEntity="Employee",inversedBy="salary")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $employee;

    /**
     * Set base_money
     *
     * @param float $baseMoney
     * @return Salary
     */
    public function setBaseMoney($baseMoney)
    {
        $this->base_money = $baseMoney;

        return $this;
    }

    /**
     * Get base_money
     *
     * @return float
     */
    public function getBaseMoney()
    {
        return $this->base_money;
    }

    /**
     * Set position_money
     *
     * @param float $positionMoney
     * @return Salary
     */
    public function setPositionMoney($positionMoney)
    {
        $this->position_money = $positionMoney;

        return $this;
    }

    /**
     * Get position_money
     *
     * @return float
     */
    public function getPositionMoney()
    {
        return $this->position_money;
    }

    /**
     * Set employee
     *
     * @param \AppBundle\Entity\Employee $employee
     * @return Salary
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
