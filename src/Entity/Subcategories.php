<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategories
 *
 * @ORM\Table(name="subcategories", indexes={@ORM\Index(name="categories_id", columns={"outerId"})})
 * @ORM\Entity
 */
class Subcategories
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titleSubcat", type="string", length=255, nullable=false)
     */
    private $titlesubcat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="outerId", referencedColumnName="id")
     * })
     */
    private $outerid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitlesubcat(): ?string
    {
        return $this->titlesubcat;
    }

    public function setTitlesubcat(string $titlesubcat): self
    {
        $this->titlesubcat = $titlesubcat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getOuterid(): ?Categories
    {
        return $this->outerid;
    }

    public function setOuterid(?Categories $outerid): self
    {
        $this->outerid = $outerid;

        return $this;
    }


}
