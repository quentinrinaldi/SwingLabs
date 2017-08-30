<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Trade as Trade;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
      * @Assert\NotBlank()
    */
    protected $lastName;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
    */
    protected $firstName;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */    
    protected $birthday;

    /**
     * @ORM\Column(type="string",length=1)
     * @Assert\Choice(choices = {"M", "F"})
     */
    protected $gender;

    /**
      * @ORM\Column(type="string")
    */
    protected $city;

    /**
      * @ORM\Column(type="string")
    */
    protected $country;

   /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */    
   protected $createdAt;

    /**
     * @Recaptcha\IsTrue(groups="UserRegistration")
    */
    public $recaptcha;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Trade", mappedBy="user",cascade={"remove"})
    */
    protected $trades;




    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_USER');
        $this->createdAt = new \DateTime('now');
    }

    public function getLastName() 
    {
        return $this->lastName;
    }

    public function getFirstName() 
    {
        return $this->firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setEmail($email)
    {
        $email = is_null($email) ? '' : $email;
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
    }

    public function setGender($gender) 
    {
        $this->gender = $gender; 
    }

    public function getGender() {
        return $this->gender;
    }


    public function getBirthday() {
        return $this->birthday;
    }

    public function setBirthday($birthday) 
    {
        $this->birthday = $birthday; 
    }


    public function getCity() {
        return $this->city;
    }

    public function setCity($city) 
    {
        $this->city = $city; 
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) 
    {
        $this->country = $country; 
    }
    public function getCreatedAt() 
    {
        return $this->createdAt;
    }
    public function setCreatedAt()
    {

    }

    public function getAge()
    {
        $dateInterval = $this->birthday->diff(new \DateTime());

        return $dateInterval->y;
    }

    public function getTrades() {
        return $this->trades;
    }

    public function addTrade (Trade $trade)
    {
        $this->trades[] = $trade;
        return $this;
    }

    public function removeRegistrationRequest(Trade $trade)
    {
        $this->trades->removeElement($trade);
    }

}