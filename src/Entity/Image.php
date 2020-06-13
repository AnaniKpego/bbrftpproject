<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    use DateTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"rooms"})
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"rooms"})
     */
    private $legend;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room", inversedBy="images", cascade={"persist", "remove"})
     */
    private $room;

    public $dataURL;
    public $file;

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getLegend()
    {
        return $this->legend;
    }

    /**
     * @param mixed $legend
     */
    public function setLegend($legend): void
    {
        $this->legend = $legend;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room): void
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getDataURL()
    {
        return $this->dataURL;
    }

    /**
     * @param mixed $dataURL
     */
    public function setDataURL($dataURL): void
    {
        $this->dataURL = $dataURL;
    }
}
