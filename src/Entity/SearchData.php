<?php

namespace App\Entity;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

class SearchData
{

    /**
     * @var string
     */
    public $q = '';
    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var DateTime
     */
    public $bookingStartedAt;

    /**
     * @var DateTime
     */
    public $bookingEndedAt;

    /**
     * @Assert\Positive
     * @Assert\Count(
     *  min = 1,
     *  max = 50,
     *  minMessage = "Le nombre min est 1",
     *  maxMessage = "le nombre maximal est de 50"
     * )
     */
    public $guestPlaceCount;

    /**
     * @var RoomEquipment[]
     */
    public $equipments = [];

    /**
     * @var RoomCategory[]
     */
    public $categories = [];

    /**
     * @var int
     */
    public $minWeekPrice;

    /**
     * @var int
     */
    public $maxWeekPrice;

    /**
     * @var int
     * @Assert\Positive
     */
    public $minWeekendPrice;

    /**
     * @var int
     * @Assert\Positive
     */
    public $maxWeekendPrice;
}
