<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GareRepository")
 */
class Gare
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $gareId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gareNom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longNom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomIv;

    /**
     * @ORM\Column(type="integer")
     */
    private $numMod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mode_;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $train;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $rer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $metro;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tramway;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $navette;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $val;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geoPoint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $geoShape;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_ref_zdl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGareId(): ?int
    {
        return $this->gareId;
    }

    public function setGareId(int $gareId): self
    {
        $this->gareId = $gareId;

        return $this;
    }

    public function getGareNom(): ?string
    {
        return $this->gareNom;
    }

    public function setGareNom(string $gareNom): self
    {
        $this->gareNom = $gareNom;

        return $this;
    }

    public function getLongNom(): ?string
    {
        return $this->longNom;
    }

    public function setLongNom(string $longNom): self
    {
        $this->longNom = $longNom;

        return $this;
    }

    public function getNomIv(): ?string
    {
        return $this->nomIv;
    }

    public function setNomIv(string $nomIv): self
    {
        $this->nomIv = $nomIv;

        return $this;
    }

    public function getNumMod(): ?int
    {
        return $this->numMod;
    }

    public function setNumMod(int $numMod): self
    {
        $this->numMod = $numMod;

        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode_;
    }

    public function setMode(string $mode_): self
    {
        $this->mode_ = $mode_;

        return $this;
    }

    public function getFer(): ?bool
    {
        return $this->fer;
    }

    public function setFer(?bool $fer): self
    {
        $this->fer = $fer;

        return $this;
    }

    public function getTrain(): ?bool
    {
        return $this->train;
    }

    public function setTrain(?bool $train): self
    {
        $this->train = $train;

        return $this;
    }

    public function getRer(): ?bool
    {
        return $this->rer;
    }

    public function setRer(?bool $rer): self
    {
        $this->rer = $rer;

        return $this;
    }

    public function getMetro(): ?bool
    {
        return $this->metro;
    }

    public function setMetro(?bool $metro): self
    {
        $this->metro = $metro;

        return $this;
    }

    public function getTramway(): ?bool
    {
        return $this->tramway;
    }

    public function setTramway(?bool $tramway): self
    {
        $this->tramway = $tramway;

        return $this;
    }

    public function getNavette(): ?bool
    {
        return $this->navette;
    }

    public function setNavette(?bool $navette): self
    {
        $this->navette = $navette;

        return $this;
    }

    public function getVal(): ?bool
    {
        return $this->val;
    }

    public function setVal(?bool $val): self
    {
        $this->val = $val;

        return $this;
    }

    public function getGeoPoint(): ?string
    {
        return $this->geoPoint;
    }

    public function setGeoPoint(string $geoPoint): self
    {
        $this->geoPoint = $geoPoint;

        return $this;
    }

    public function getGeoShape(): ?string
    {
        return $this->geoShape;
    }

    public function setGeoShape(string $geoShape): self
    {
        $this->geoShape = $geoShape;

        return $this;
    }

    public function getIdRefZdl(): ?int
    {
        return $this->id_ref_zdl;
    }

    public function setIdRefZdl(?int $id_ref_zdl): self
    {
        $this->id_ref_zdl = $id_ref_zdl;

        return $this;
    }
}
