<?php

namespace AppBundle\Entity;

/**
 * Status
 */
class Status
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $lng;

    /**
     * @var string
     */
    private $ltd;


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
     * Set note
     *
     * @param string $note
     *
     * @return Status
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set lng
     *
     * @param string $lng
     *
     * @return Status
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set ltd
     *
     * @param string $ltd
     *
     * @return Status
     */
    public function setLtd($ltd)
    {
        $this->ltd = $ltd;

        return $this;
    }

    /**
     * Get ltd
     *
     * @return string
     */
    public function getLtd()
    {
        return $this->ltd;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cities;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Status
     */
    public function addCity(\AppBundle\Entity\City $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \AppBundle\Entity\City $city
     */
    public function removeCity(\AppBundle\Entity\City $city)
    {
        $this->cities->removeElement($city);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }
    /**
     * @var \AppBundle\Entity\City
     */
    private $city;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;


    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Status
     */
    public function setCity(\AppBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Status
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
