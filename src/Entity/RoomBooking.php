<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomBookingRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class RoomBooking extends AbstractBooking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room", inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $room;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Callback appelé à chaque fois qu'on créé une réservation
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
     * @return void
     */
    public function prePersist()
    {
        if (empty($this->amount)) {
            // prix de l'annonce * nombre de jour

            $this->amount = $this->room->getWeekPrice() * $this->getDurations()['week'] +
                $this->room->getWeekendPrice() * $this->getDurations()['weekend'];
        }
    }

    /**
     * Permet de savoir si les dates réservées sont disponibles ou non
     *
     * @return boolean
     */
    public function isBookableDates()
    {
        // 1) Il faut connaitre les dates qui sont impossibles pour la chambre
        $notAvailableDays = $this->room->getNotAvailableDays();
        // 2) Il faut comparer les dates choisies avec les dates impossibles
        $bookingDays = $this->getDays();

        $formatDay = function ($day) {
            return $day->format('Y-m-d');
        };

        // Tableau des chaines de caractères de mes journées
        $days = array_map($formatDay, $bookingDays);
        $notAvailable = array_map($formatDay, $notAvailableDays);

        foreach ($days as $day) {
            if (array_search($day, $notAvailable) !== false) return false;
        }

        return true;
    }

    /**
     * Permet de récupérer un tableau des journées qui correspondent à ma réservation
     *
     * @return array Un tableau d'objets DateTime représentant les jours de la réservation
     */
    public function getDays()
    {
        $resultat = range(
            $this->startedAt->getTimestamp(),
            $this->endedAt->getTimestamp(),
            24 * 60 * 60
        );

        $days = array_map(function ($dayTimestamp) {
            return new DateTime(date('Y-m-d', $dayTimestamp));
        }, $resultat);

        return $days;
    }

    public function getDurations()
    {
        $diff = $this->endedAt->diff($this->startedAt)->days;
        $date = new DateTime($this->startedAt->format('Y-m-d H:i:s'));
        $date->modify("-1 day");
        $dur = ["week" => 0, "weekend" => 0];
        for ($i = 0; $i < $diff; $i++) {
            $date->modify("+1 day");

            if ($date->format('N') == 6 || $date->format('N') == 7) {
                $dur['weekend']++;
            } else {
                $dur['week']++;
            }
        }
        //dd($dur);

        return $dur;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        return $this;
    }


}
