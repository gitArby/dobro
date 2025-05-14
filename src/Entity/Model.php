<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="models")
 */
class Model
{
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;

    /** @ORM\Column(type="string") */
    private $model_name;

    /**
     * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="models")
     * @ORM\JoinColumn(name="id_manufacturer", referencedColumnName="id")
     */
    private $manufacturer;

    /**
     * @ORM\OneToMany(targetEntity="Car", mappedBy="model")
     */
    private $cars;

    public function getId(): int {
        return $this->id;
    }

    public function getModelName(): string {
        return $this->model_name;
    }

    public function setModelName(string $name): void {
        $this->model_name = $name;
    }

    public function getManufacturer(): Manufacturer {
        return $this->manufacturer;
    }

    public function getCars() {
        return $this->cars;
    }

    public function setManufacturer(Manufacturer $manufacturer): void {
        $this->manufacturer = $manufacturer;
    }
}
