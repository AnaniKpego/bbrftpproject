<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeOfTariffRepository")
 */
class TypeOfTariff
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
     * @ORM\OneToMany(targetEntity="App\Entity\Tariff", mappedBy="typeOfTariff", orphanRemoval=true)
     */
    private $tariffs;

    public function __construct()
    {
        $this->tariffs = new ArrayCollection();
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
            $tariff->setTypeOfTariff($this);
        }

        return $this;
    }

    public function removeTariff(Tariff $tariff): self
    {
        if ($this->tariffs->contains($tariff)) {
            $this->tariffs->removeElement($tariff);
            // set the owning side to null (unless already changed)
            if ($tariff->getTypeOfTariff() === $this) {
                $tariff->setTypeOfTariff(null);
            }
        }

        return $this;
    }
}
