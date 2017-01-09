<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdministratorRepository")
 * @ORM\Table(name="administrator",options={"comment":"管理员表"})
 */
class Administrator
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Employee",inversedBy="admin")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $employee;

    /**
     * @ORM\Column(name="role", type="string",length=255,options={"comment":"角色 详情见配置文件"})
     */
    private $role;

    const ROLELIST = array(
        'ROLE_SUPER' => '超级管理员',
        'ROLE_HR' => '人事管理员',
        'ROLE_FINANCE' => '财务管理员',
        'ROLE_LICIT' => '普通用户',
    );

    /**
     * Get id
     *
     * @return integer
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Administrator
     */
    function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return array
     */
    function getRole()
    {
        $this->setRole(strtoupper($this->role));
        $roles = self::ROLELIST ;
        $keys = array_keys($roles);
        $defule_key = end($keys);
        $defule_val = end($roles);
        return $this->role ? array($this->role => $roles[$this->role]) : array($defule_key => $defule_val);
    }

    /**
     * Set employee
     *
     * @param \AppBundle\Entity\Employee $employee
     * @return Administrator
     */
    function setEmployee(\AppBundle\Entity\Employee $employee = null)
    {
        // $employee->setAdmin($this);
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \AppBundle\Entity\Employee
     */
    function getEmployee()
    {
        return $this->employee;
    }
}
