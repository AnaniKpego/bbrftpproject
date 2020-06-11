<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\SlideRepository")
 */
class Slide
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Slidelayer")
     */
    private $slidelayer;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="slide_image", fileNameProperty="filename")
     */
    private $imageFile;


    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    public function __construct()
    {
        $this->slidelayer = new ArrayCollection();
        $this->createdAt = new \DateTime('now');

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

    /**
     * @return Collection|Slidelayer[]
     */
    public function getSlidelayer(): Collection
    {
        return $this->slidelayer;
    }

    public function addSlidelayer(Slidelayer $slidelayer): self
    {
        if (!$this->slidelayer->contains($slidelayer)) {
            $this->slidelayer[] = $slidelayer;
        }

        return $this;
    }

    public function removeSlidelayer(Slidelayer $slidelayer): self
    {
        if ($this->slidelayer->contains($slidelayer)) {
            $this->slidelayer->removeElement($slidelayer);
        }

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
     * @return Slide
     */
    public function setImageFile(?File $imageFile): Slide
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile){
            $this->updatedAt = new \DateTime('now');
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
     * @return Slide
     */
    public function setFilename(?string $filename): Slide
    {
        $this->filename = $filename;
        return $this;
    }

}
