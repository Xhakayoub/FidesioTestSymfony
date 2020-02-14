<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RelationRepository")
 */
class Relation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(nullable=true)
     */
    private $gareId;

    /**
     * @ORM\Column(nullable=true)
     */
    private $ligne;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $terminus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGareId(): string
    {
        return $this->gareId;
    }

    public function setGareId(string $gareId): self
    {
        $this->gareId = $gareId;

        return $this;
    }

    public function getLigne(): string
    {
        return $this->ligne;
    }

    public function setLigne(string $ligne): self
    {
        $this->ligne = $ligne;

        return $this;
    }

    public function getTerminus(): bool
    {
        return $this->terminus;
    }

    public function setTerminus(bool $terminus): self
    {
        $this->terminus = $terminus;

        return $this;
    }
}
