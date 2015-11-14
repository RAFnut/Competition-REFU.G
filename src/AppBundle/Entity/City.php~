<?php

namespace AppBundle\Entity;

/**
 * City
 */
class City
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     *
     * @return City
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
     * Set lng
     *
     * @param string $lng
     *
     * @return City
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
     * @return City
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
    private $statuses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->statuses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return City
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
