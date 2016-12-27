<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="ApplyRepository")
 * @ORM\Table(name="apply",options={"comment":"附件"})
 */
class Apply
{

    /**
     * @ORM\ManyToOne(targetEntity="Employee")
     * @ORM\JoinColumn(name="approver", referencedColumnName="id")
     */
    private $approver;

    /**
     * @ORM\ManyToOne(targetEntity="Employee")
     * @ORM\JoinColumn(name="applicant", referencedColumnName="id")
     */
    private $applicant;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\Column(name="status", type="smallint",options={"default":0,"comment":"申请状态0:待审批，1：已通过，2：拒绝"})
     */
    private $status;

    /**
     * @ORM\Column(name="annex", type="string", length=255,options={"comment":"附件"})
     */
    private $annex;

    /**
     * @ORM\Column(name="apply_type", type="smallint",options={"comment":"申请类型，见项目配置文件"})
     */
    private $applyType;

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
     * Set content
     *
     * @param string $content
     * @return Apply
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Apply
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set annex
     *
     * @param string $annex
     * @return Apply
     */
    public function setAnnex($annex)
    {
        $this->annex = $annex;

        return $this;
    }

    /**
     * Get annex
     *
     * @return string 
     */
    public function getAnnex()
    {
        return $this->annex;
    }

    /**
     * Set applyType
     *
     * @param integer $applyType
     * @return Apply
     */
    public function setApplyType($applyType)
    {
        $this->applyType = $applyType;

        return $this;
    }

    /**
     * Get applyType
     *
     * @return integer 
     */
    public function getApplyType()
    {
        return $this->applyType;
    }

    /**
     * Set approver
     *
     * @param \AppBundle\Entity\Employee $approver
     * @return Apply
     */
    public function setApprover(\AppBundle\Entity\Employee $approver = null)
    {
        $this->approver = $approver;

        return $this;
    }

    /**
     * Get approver
     *
     * @return \AppBundle\Entity\Employee 
     */
    public function getApprover()
    {
        return $this->approver;
    }

    /**
     * Set applicant
     *
     * @param \AppBundle\Entity\Employee $applicant
     * @return Apply
     */
    public function setApplicant(\AppBundle\Entity\Employee $applicant = null)
    {
        $this->applicant = $applicant;

        return $this;
    }

    /**
     * Get applicant
     *
     * @return \AppBundle\Entity\Employee 
     */
    public function getApplicant()
    {
        return $this->applicant;
    }
}
