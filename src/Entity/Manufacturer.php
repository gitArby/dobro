<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="manufacturers")
 */
class Manufacturer
{
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;

    /** @ORM\Column(type="string") */
    private $manufacturer_name;

    /** @ORM\OneToMany(targetEntity="Model", mappedBy="manufacturer") */
    private $models;

    public function __construct() {
        $this->models = new ArrayCollection();
    }

    public function getId(): int {
        return $this->id;
    }

    public function getManufacturerName(): string {
        return $this->manufacturer_name;
    }

    public function setManufacturerName(string $name): void {
        $this->manufacturer_name = $name;
    }

    public function getModels(): Collection {
        return $this->models;
    }
}
