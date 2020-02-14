<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneRepository")
 */
class Ligne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ligne;

    /**
     * @ORM\Column(type="float")
     */
    private $code_ligf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $indice_lig;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reseau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $res_com;

    /**
     * @ORM\Column(type="float")
     */
    private $res_stif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exploitant;

    /**
     * @ORM\Column(type="float")
     */
    private $x;

    /**
     * @ORM\Column(type="float")
     */
    private $y;

    /**
     * @ORM\Column(type="integer")
     */
    private $principal;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigne(): ?string
    {
        return $this->ligne;
    }

    public function setLigne(string $ligne): self
    {
        $this->ligne = $ligne;

        return $this;
    }

    public function getCodeLigf(): ?float
    {
        return $this->code_ligf;
    }

    public function setCodeLigf(float $code_ligf): self
    {
        $this->code_ligf = $code_ligf;

        return $this;
    }

    public function getIndiceLig(): ?string
    {
        return $this->indice_lig;
    }

    public function setIndiceLig(string $indice_lig): self
    {
        $this->indice_lig = $indice_lig;

        return $this;
    }

    public function getReseau(): ?string
    {
        return $this->reseau;
    }

    public function setReseau(string $reseau): self
    {
        $this->reseau = $reseau;

        return $this;
    }

    public function getResCom(): ?string
    {
        return $this->res_com;
    }

    public function setResCom(string $res_com): self
    {
        $this->res_com = $res_com;

        return $this;
    }

    public function getResStif(): ?float
    {
        return $this->res_stif;
    }

    public function setResStif(float $res_stif): self
    {
        $this->res_stif = $res_stif;

        return $this;
    }

    public function getExploitant(): ?string
    {
        return $this->exploitant;
    }

    public function setExploitant(string $exploitant): self
    {
        $this->exploitant = $exploitant;

        return $this;
    }

    public function getX(): ?float
    {
        return $this->x;
    }

    public function setX(float $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?float
    {
        return $this->y;
    }

    public function setY(float $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getPrincipal(): ?int
    {
        return $this->principal;
    }

    public function setPrincipal(int $principal): self
    {
        $this->principal = $principal;

        return $this;
    }

    
}
