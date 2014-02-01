<?php

namespace GER\Bundle\AmazonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecordSet
 */
class RecordSet
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $ttl;

    /**
     * @var string
     */
    private $name;

    /**
     * @var text
     */
    private $value;


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
     * Set ttl
     *
     * @param integer $ttl
     * @return RecordSet
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * Get ttl
     *
     * @return integer 
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * Set name
     *
     * @param text $name
     * @return RecordSet
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
     * Set value
     *
     * @param string $value
     * @return RecordSet
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
}
