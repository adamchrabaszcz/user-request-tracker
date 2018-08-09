<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoolStuffRepository")
 */
class CoolStuff
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cool;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * Get Id
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * @param string $name 
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Cool
     *
     * @return bool
     */
    public function getCool(): ?bool
    {
        return $this->cool;
    }

    /**
     * Set Cool
     *
     * @param bool $cool 
     * @return self
     */
    public function setCool(?bool $cool): self
    {
        $this->cool = $cool;

        return $this;
    }

    /**
     * Get File
     *
     * @return string
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Set File
     *
     * @param string $file 
     * @return self
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }
}
