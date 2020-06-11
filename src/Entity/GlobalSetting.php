<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GlobalSettingRepository")
 */
class GlobalSetting
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
    private $siteTitle;

    /**
     * @ORM\Column(type="text")
     */
    private $siteDescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siteEmail;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $siteLogo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteTitle(): ?string
    {
        return $this->siteTitle;
    }

    public function setSiteTitle(string $siteTitle): self
    {
        $this->siteTitle = $siteTitle;

        return $this;
    }

    public function getSiteDescription(): ?string
    {
        return $this->siteDescription;
    }

    public function setSiteDescription(string $siteDescription): self
    {
        $this->siteDescription = $siteDescription;

        return $this;
    }

    public function getSiteEmail(): ?string
    {
        return $this->siteEmail;
    }

    public function setSiteEmail(string $siteEmail): self
    {
        $this->siteEmail = $siteEmail;

        return $this;
    }

    public function getSiteLogo(): ?Image
    {
        return $this->siteLogo;
    }

    public function setSiteLogo(Image $siteLogo): self
    {
        $this->siteLogo = $siteLogo;

        return $this;
    }

    public function getPhone1(): ?string
    {
        return $this->phone1;
    }

    public function setPhone1(string $phone1): self
    {
        $this->phone1 = $phone1;

        return $this;
    }

    public function getPhone2(): ?string
    {
        return $this->phone2;
    }

    public function setPhone2(?string $phone2): self
    {
        $this->phone2 = $phone2;

        return $this;
    }
}
