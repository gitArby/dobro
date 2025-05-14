<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="owners")
 */
class Owner
{
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    private $id;

    /** @ORM\Column(type="string") */
    private $first_name;

    /** @ORM\Column(type="string") */
    private $last_name;

    /** @ORM\Column(type="string") */
    private $email;

    public function getId(): int {
        return $this->id;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function getEmail(): string {
        return $this->email;
    }
}
