<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceBookingRepository")
 */
class ServiceBooking extends AbstractBooking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="bookings")
     */
    private $service;

    /**
     * @ORM\Column(type="datetime")
     */
    private $bookingAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getBookingAt(): ?\DateTimeInterface
    {
        return $this->bookingAt;
    }

    public function setBookingAt(\DateTimeInterface $bookingAt): self
    {
        $this->bookingAt = $bookingAt;

        return $this;
    }

    public function __construct()
    {
        $this->startedAt = new \DateTime('now');
        $this->amount = 0;
    }
}
