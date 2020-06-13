<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 * @UniqueEntity(
 *      fields={"title"},
 *      message="Une chambre possède déjà ce nom"
 * )
 */
class Room
{
    use DateTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"rooms"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"rooms"})
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"rooms"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"rooms"})
     */
    private $summary;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"rooms"})
     */
    private $weekPrice;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"rooms"})
     */
    private $weekendPrice;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="room")
     * @Groups({"rooms"})
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RoomBooking", mappedBy="room", orphanRemoval=true)
     */
    private $bookings;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"rooms"})
     */
    private $guestPlaceCount;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RoomEquipment", mappedBy="rooms")
     * @Groups({"rooms"})
     */
    private $equipments;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RoomCategory", inversedBy="rooms")
     */
    private $roomsCategories;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->published = true;
        $this->equipments = new ArrayCollection();
        $this->createdAt = new \DateTime('now');
        $this->roomsCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Permet d'obtenir un tableau des jours qui ne sont pas disponibles pour cette chambre
     *
     * @return array Un tableau d'objets DateTime représentant les jours d'occupation
     */
    public function getNotAvailableDays() {
        $notAvailableDays = [];

        foreach($this->bookings as $booking) {
            // Calculer les jours qui se trouvent entre la date d'arrivée et de départ
            $resultat = range(
                $booking->getStartedAt()->getTimestamp(),
                $booking->getEndedAt()->getTimestamp(),
                24 * 60 * 60
            );

            $days = array_map(function($dayTimestamp){
                return new \DateTime(date('Y-m-d', $dayTimestamp));
            }, $resultat);

            $notAvailableDays = array_merge($notAvailableDays, $days);
        }

        return $notAvailableDays;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getWeekPrice(): ?int
    {
        return $this->weekPrice;
    }

    public function setWeekPrice(int $weekPrice): self
    {
        $this->weekPrice = $weekPrice;

        return $this;
    }

    public function getWeekendPrice(): ?int
    {
        return $this->weekendPrice;
    }

    public function setWeekendPrice(int $weekendPrice): self
    {
        $this->weekendPrice = $weekendPrice;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRoom($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getRoom() === $this) {
                $image->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RoomBooking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addRoomBooking(RoomBooking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setRoom($this);
        }

        return $this;
    }

    public function removeRoomBooking(RoomBooking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getRoom() === $this) {
                $booking->setRoom(null);
            }
        }

        return $this;
    }

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGuestPlaceCount(): ?int
    {
        return $this->guestPlaceCount;
    }

    /**
     * @param mixed $guestPlaceCount
     * @return Room
     */
    public function setGuestPlaceCount(int $guestPlaceCount)
    {
        $this->guestPlaceCount = $guestPlaceCount;
        return $this;
    }

    /**
     * @return Collection|RoomEquipment[]
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
    }

    public function addEquipment(RoomEquipment $equipment): self
    {
        if (!$this->equipments->contains($equipment)) {
            $this->equipments[] = $equipment;
            $equipment->addRoom($this);
        }

        return $this;
    }

    public function removeEquipment(RoomEquipment $equipment): self
    {
        if ($this->equipments->contains($equipment)) {
            $this->equipments->removeElement($equipment);
            $equipment->removeRoom($this);
        }

        return $this;
    }

    public function getFormatPrice($price){
        $price = number_format($price,0,' ',' ').' XOF';

        return $price;
    }

    public function getRoomLevel(){
        if ($this->weekPrice >= 300000){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return Collection|RoomCategory[]
     */
    public function getRoomsCategories(): Collection
    {
        return $this->roomsCategories;
    }

    public function addRoomsCategory(RoomCategory $roomsCategory): self
    {
        if (!$this->roomsCategories->contains($roomsCategory)) {
            $this->roomsCategories[] = $roomsCategory;
        }

        return $this;
    }

    public function removeRoomsCategory(RoomCategory $roomsCategory): self
    {
        if ($this->roomsCategories->contains($roomsCategory)) {
            $this->roomsCategories->removeElement($roomsCategory);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
