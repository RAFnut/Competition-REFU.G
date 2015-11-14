<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 */
class User implements UserInterface, \Serializable
{
    public function __construct()
    {
        $this->salt = md5(uniqid(null, true));
    }

    /****************/
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials(){

    }

    public function serialize()
    {
        return serialize(array($this->id));
    }

    public function unserialize($serialized)
    {
        list($this->id) = unserialize($serialized);
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;


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
     * Set username
     *
     * @param string $username
     * @return Admin
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Admin
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
     * Set salt
     *
     * @param string $salt
     * @return Admin
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * @var string
     */
    private $full_name;

    /**
     * @var string
     */
    private $dob;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $picture;


    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return User
     */
    public function setFullName($fullName)
    {
        $this->full_name = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * Set dob
     *
     * @param string $dob
     *
     * @return User
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set gender
     *
     * @param string $gender
     *
     * @return User
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

    /**
     * Set number
     *
     * @param string $number
     *
     * @return User
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $peopleIFollow;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $peopleFollowMe;


    /**
     * Add peopleIFollow
     *
     * @param \AppBundle\Entity\User $peopleIFollow
     *
     * @return User
     */
    public function addPeopleIFollow(\AppBundle\Entity\User $peopleIFollow)
    {
        $this->peopleIFollow[] = $peopleIFollow;

        return $this;
    }

    /**
     * Remove peopleIFollow
     *
     * @param \AppBundle\Entity\User $peopleIFollow
     */
    public function removePeopleIFollow(\AppBundle\Entity\User $peopleIFollow)
    {
        $this->peopleIFollow->removeElement($peopleIFollow);
    }

    /**
     * Get peopleIFollow
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeopleIFollow()
    {
        return $this->peopleIFollow;
    }

    /**
     * Add peopleFollowMe
     *
     * @param \AppBundle\Entity\User $peopleFollowMe
     *
     * @return User
     */
    public function addPeopleFollowMe(\AppBundle\Entity\User $peopleFollowMe)
    {
        $this->peopleFollowMe[] = $peopleFollowMe;

        return $this;
    }

    /**
     * Remove peopleFollowMe
     *
     * @param \AppBundle\Entity\User $peopleFollowMe
     */
    public function removePeopleFollowMe(\AppBundle\Entity\User $peopleFollowMe)
    {
        $this->peopleFollowMe->removeElement($peopleFollowMe);
    }

    /**
     * Get peopleFollowMe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeopleFollowMe()
    {
        return $this->peopleFollowMe;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $statuses;


    /**
     * Add status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return User
     */
    public function addStatus(\AppBundle\Entity\Status $status)
    {
        $this->statuses[] = $status;

        return $this;
    }

    /**
     * Remove status
     *
     * @param \AppBundle\Entity\Status $status
     */
    public function removeStatus(\AppBundle\Entity\Status $status)
    {
        $this->statuses->removeElement($status);
    }

    /**
     * Get statuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatuses()
    {
        return $this->statuses;
    }
}
