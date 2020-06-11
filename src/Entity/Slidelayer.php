<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;

/**
 * @Uploadable()
 * @ORM\Entity(repositoryClass="App\Repository\SlidelayerRepository")
 */
class Slidelayer
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $class;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dataX;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dataHoffset;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dataY;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dataVoffset;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dataResponsiveOffset;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dataWhitespace;

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

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getDataX(): ?string
    {
        return $this->dataX;
    }

    public function setDataX(?string $dataX): self
    {
        $this->dataX = $dataX;

        return $this;
    }

    public function getDataHoffset(): ?int
    {
        return $this->dataHoffset;
    }

    public function setDataHoffset(?int $dataHoffset): self
    {
        $this->dataHoffset = $dataHoffset;

        return $this;
    }

    public function getDataY(): ?int
    {
        return $this->dataY;
    }

    public function setDataY(?int $dataY): self
    {
        $this->dataY = $dataY;

        return $this;
    }

    public function getDataVoffset(): ?string
    {
        return $this->dataVoffset;
    }

    public function setDataVoffset(?string $dataVoffset): self
    {
        $this->dataVoffset = $dataVoffset;

        return $this;
    }

    public function getDataResponsiveOffset(): ?string
    {
        return $this->dataResponsiveOffset;
    }

    public function setDataResponsiveOffset(?string $dataResponsiveOffset): self
    {
        $this->dataResponsiveOffset = $dataResponsiveOffset;

        return $this;
    }

    public function getDataWhitespace(): ?string
    {
        return $this->dataWhitespace;
    }

    public function setDataWhitespace(?string $dataWhitespace): self
    {
        $this->dataWhitespace = $dataWhitespace;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }
}
