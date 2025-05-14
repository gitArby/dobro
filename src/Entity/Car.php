<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cars")
 */
class Car
{
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;

    /** @ORM\Column(type="string") */
    private $vin_code;

    /** @ORM\Column(type="string") */
    private $engine_model;

    /** @ORM\Column(type="date") */
    private $manufactured_in;

    /**
     * @ORM\ManyToOne(targetEntity="Model", inversedBy="cars")
     * @ORM\JoinColumn(name="id_model", referencedColumnName="id")
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="Owner")
     * @ORM\JoinColumn(name="id_owner", referencedColumnName="id", nullable=true)
     */
    private $owner;

    public function getOwner(): ?Owner {
        return $this->owner;
    }
}
