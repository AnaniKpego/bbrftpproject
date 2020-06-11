<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
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
     * @ORM\Column(type="string", length=255)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="service_image", fileNameProperty="filename")
     */
    private $imageFile;


    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tariff", inversedBy="services")
     */
    private $tariffs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ServiceBooking", mappedBy="service")
     */
    private $bookings;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->tariffs = new ArrayCollection();
        $this->bookings = new ArrayCollection();
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

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return null|File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param null|File $imageFile
     * @return Service
     */
    public function setImageFile(?File $imageFile): Service
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile){
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param null|string $filename
     * @return Service
     */
    public function setFilename(?string $filename): Service
    {
        $this->filename = $filename;
        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return Collection|Tariff[]
     */
    public function getTariffs(): Collection
    {
        return $this->tariffs;
    }

    public function addTariff(Tariff $tariff): self
    {
        if (!$this->tariffs->contains($tariff)) {
            $this->tariffs[] = $tariff;
        }

        return $this;
    }

    public function removeTariff(Tariff $tariff): self
    {
        if ($this->tariffs->contains($tariff)) {
            $this->tariffs->removeElement($tariff);
        }

        return $this;
    }

    /**
     * @return Collection|ServiceBooking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(ServiceBooking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setService($this);
        }

        return $this;
    }

    public function removeBooking(ServiceBooking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getService() === $this) {
                $booking->setService(null);
            }
        }

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

    public function getFormatPrice(){

        return number_format($this->price,0,' ',' ').' XOF';
    }


}
