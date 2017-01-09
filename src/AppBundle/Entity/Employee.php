<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 * @ORM\Table(name="employee",options={"comment":"员工表"})
 */
class Employee implements AdvancedUserInterface, \Serializable
{

    /**
     * @ORM\OneToOne(targetEntity="Holiday",mappedBy="employee")
     */
    private $holiday;

    /**
     * @ORM\OneToOne(targetEntity="Salary",mappedBy="employee")
     */
    private $salary;

    /**
     * @ORM\OneToOne(targetEntity="Rank")
     * @ORM\JoinColumn(name="rank_id",referencedColumnName="id")
     */
    private $rank;

    /**
     * @ORM\OneToMany(targetEntity="WorkExperience",mappedBy="employee")
     */
    private $workexperiences;

    /**
     * @ORM\OneToOne(targetEntity="Administrator",mappedBy="employee")
     */
    private $admin;

    /**
     * @ORM\OneToMany(targetEntity="EduExperience",mappedBy="employee")
     */
    private $eduexperiences;

    /**
     * @ORM\OneToMany(targetEntity="Signrecord",mappedBy="employee")
     */
    private $signrecords;

    /**
     * @ORM\ManyToOne(targetEntity="Employee")
     * @ORM\JoinColumn(name="leader_id",referencedColumnName="id")
     */
    private $leader;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(length=255,unique=true,options={"comment":"邮箱"})
     * @Assert\Email(message="errors.messages.email",checkMX = true)
     */
    private $email;

    /**
     * @ORM\Column(length=255,options={"comment":"password"})
     * @Assert\NotBlank
     */
    private $password;

    /**
     * @ORM\Column(length=255,options={"comment":"name"})
     * @Assert\NotBlank(message="errors.messages.not_found")
     */
    private $name;

    /**
     * @ORM\Column(name="gender", type="string", length=1)
     */
    private $gender;

    /**
     * @ORM\Column(length=30,nullable=true,options={"comment":"phone"})
     */
    private $phone;

    /**
     * @ORM\Column(length=30,nullable=true,options={"comment":"seat_phone"})
     */
    private $seat_phone;

    /**
     * @ORM\Column(type="date",nullable=true,options={"comment":"birthday"})
     */
    private $birthday;

    /**
     * @ORM\Column(name="id_number",length=50,nullable=true,options={"comment":"身份证"})
     */
    private $IDnumber;

    /**
     * @ORM\Column(name="is_active", type="boolean",options={"comment":"是否可用","default":true})
     */
    private $isActive;

    public function __construct()
    {
        $this->workexperiences = new ArrayCollection();
        $this->eduexperiences = new ArrayCollection();
        $this->signrecords = new ArrayCollection();
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

    /**
     * Set email
     *
     * @param string $email
     * @return Employee
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Employee
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Employee
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Employee
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set seat_phone
     *
     * @param string $seatPhone
     * @return Employee
     */
    public function setSeatPhone($seatPhone)
    {
        $this->seat_phone = $seatPhone;

        return $this;
    }

    /**
     * Get seat_phone
     *
     * @return string
     */
    public function getSeatPhone()
    {
        return $this->seat_phone;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Employee
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set IDnumber
     *
     * @param string $iDnumber
     * @return Employee
     */
    public function setIDnumber($iDnumber)
    {
        $this->IDnumber = $iDnumber;

        return $this;
    }

    /**
     * Get IDnumber
     *
     * @return string
     */
    public function getIDnumber()
    {
        return $this->IDnumber;
    }

    /**
     * Set salary
     *
     * @param \AppBundle\Entity\Salary $salary
     * @return Employee
     */
    public function setSalary(\AppBundle\Entity\Salary $salary = null)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return \AppBundle\Entity\Salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set rank
     *
     * @param \AppBundle\Entity\Rank $rank
     * @return Employee
     */
    public function setRank(\AppBundle\Entity\Rank $rank = null)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return \AppBundle\Entity\Rank
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Add workexperiences
     *
     * @param \AppBundle\Entity\WorkExperience $workexperiences
     * @return Employee
     */
    public function addWorkexperience(\AppBundle\Entity\WorkExperience $workexperiences)
    {
        $this->workexperiences[] = $workexperiences;

        return $this;
    }

    /**
     * Remove workexperiences
     *
     * @param \AppBundle\Entity\WorkExperience $workexperiences
     */
    public function removeWorkexperience(\AppBundle\Entity\WorkExperience $workexperiences)
    {
        $this->workexperiences->removeElement($workexperiences);
    }

    /**
     * Get workexperiences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorkexperiences()
    {
        return $this->workexperiences;
    }

    /**
     * Set leader
     *
     * @param \AppBundle\Entity\Employee $leader
     * @return Employee
     */
    public function setLeader(\AppBundle\Entity\Employee $leader = null)
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * Get leader
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Set holiday
     *
     * @param \AppBundle\Entity\Holiday $holiday
     * @return Employee
     */
    public function setHoliday(\AppBundle\Entity\Holiday $holiday = null)
    {
        $this->holiday = $holiday;

        return $this;
    }

    /**
     * Get holiday
     *
     * @return \AppBundle\Entity\Holiday
     */
    public function getHoliday()
    {
        return $this->holiday;
    }

    /**
     * Add eduexperiences
     *
     * @param \AppBundle\Entity\EduExperience $eduexperiences
     * @return Employee
     */
    public function addEduexperience(\AppBundle\Entity\EduExperience $eduexperiences)
    {
        $this->eduexperiences[] = $eduexperiences;

        return $this;
    }

    /**
     * Remove eduexperiences
     *
     * @param \AppBundle\Entity\EduExperience $eduexperiences
     */
    public function removeEduexperience(\AppBundle\Entity\EduExperience $eduexperiences)
    {
        $this->eduexperiences->removeElement($eduexperiences);
    }

    /**
     * Get eduexperiences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEduexperiences()
    {
        return $this->eduexperiences;
    }

    /**
     * Add signrecords
     *
     * @param \AppBundle\Entity\Signrecord $signrecords
     * @return Employee
     */
    public function addSignrecord(\AppBundle\Entity\Signrecord $signrecords)
    {
        $this->signrecords[] = $signrecords;

        return $this;
    }

    /**
     * Remove signrecords
     *
     * @param \AppBundle\Entity\Signrecord $signrecords
     */
    public function removeSignrecord(\AppBundle\Entity\Signrecord $signrecords)
    {
        $this->signrecords->removeElement($signrecords);
    }

    /**
     * Get signrecords
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSignrecords()
    {
        return $this->signrecords;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Employee
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Employee
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**   --登录认证-- **/
    public function getUsername()
    {
        return $this->name;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        $role = $this->admin->getRole();
        $keys = array_keys(Administrator::ROLELIST);
        $defule_key = end($keys);
        return $role ? array_keys($role) : array($defule_key);
    }

    public function eraseCredentials() {}

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->name,
            $this->password,
            $this->isActive,
        ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->name,
            $this->password,
            $this->isActive
        ) = unserialize($serialized);
    }

    /**
     * Set admin
     *
     * @param \AppBundle\Entity\Administrator $admin
     * @return Employee
     */
    public function setAdmin(\AppBundle\Entity\Administrator $admin = null)
    {
        // $admin->setEmployee($this);
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return \AppBundle\Entity\Administrator
     */
    public function getAdmin()
    {
        return $this->admin;
    }
}
