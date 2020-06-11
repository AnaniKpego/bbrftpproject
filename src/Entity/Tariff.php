<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TariffRepository")
 */
class Tariff
{
    use DateTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $detail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeOfTariff", inversedBy="tariffs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeOfTariff;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Event", mappedBy="tariffs")
     */
    private $events;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Service", mappedBy="tariffs")
     */
    private $services;

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->events = new ArrayCollection();
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getTypeOfTariff(): ?TypeOfTariff
    {
        return $this->typeOfTariff;
    }

    public function setTypeOfTariff(?TypeOfTariff $typeOfTariff): self
    {
        $this->typeOfTariff = $typeOfTariff;

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->addTariff($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            $event->removeTariff($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getFormatPrice(){

        return number_format($this->price,0,' ',' ').' XOF';
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->addTariff($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->contains($service)) {
            $this->services->removeElement($service);
            $service->removeTariff($this);
        }

        return $this;
    }
}
