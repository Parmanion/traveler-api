<?php

namespace App\Place;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Gedmo\Tree(type="closure")
 * @Gedmo\TreeClosure(class="App\Place\PlaceClosure")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\ClosureTreeRepository")
 */
class Place
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\Column(type="string", length=17)
     * @ORM\CustomIdGenerator(class="App\Core\UuidGenerator")
     */
    private $id;

    /**
     * This parameter is optional for the closure strategy
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     * @Gedmo\TreeLevel
     */
    private $level;

    /**
     * @Gedmo\TreeParent
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="children")
     */
    private $parent;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $name;

    /**  @ORM\Column(type="text", nullable=true) */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $datetimeStartUtc;
    /**  @ORM\Column(type="datetime", nullable=false) */
    private $datetimeStartLocal;

    /**  @ORM\Column(type="string", length=50, options={"default": "Europe/Paris"}) */
    private $timezoneStart;

    /**  @ORM\Column(type="datetime", nullable=false) */
    private $datetimeEndUtc;

    /**  @ORM\Column(type="datetime", nullable=false) */
    private $datetimeEndLocal;

    /**  @ORM\Column(type="string", length=50, options={"default": "Europe/Paris"}) */
    private $timezoneEnd;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=false, name="createdAt")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=false, name="updatedAt")
     */
    private $updatedAt;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getDatetimeStartUtc(): ?\DateTimeInterface
    {
        return $this->datetimeStartUtc;
    }

    public function setDatetimeStartUtc(\DateTimeInterface $datetimeStartUtc): self
    {
        $this->datetimeStartUtc = $datetimeStartUtc;

        return $this;
    }

    public function getDatetimeStartLocal(): ?\DateTimeInterface
    {
        return $this->datetimeStartLocal;
    }

    public function setDatetimeStartLocal(\DateTimeInterface $datetimeStartLocal): self
    {
        $this->datetimeStartLocal = $datetimeStartLocal;

        return $this;
    }

    public function getTimezoneStart(): ?string
    {
        return $this->timezoneStart;
    }

    public function setTimezoneStart(string $timezoneStart): self
    {
        $this->timezoneStart = $timezoneStart;

        return $this;
    }

    public function getDatetimeEndUtc(): ?\DateTimeInterface
    {
        return $this->datetimeEndUtc;
    }

    public function setDatetimeEndUtc(\DateTimeInterface $datetimeEndUtc): self
    {
        $this->datetimeEndUtc = $datetimeEndUtc;

        return $this;
    }

    public function getDatetimeEndLocal(): ?\DateTimeInterface
    {
        return $this->datetimeEndLocal;
    }

    public function setDatetimeEndLocal(\DateTimeInterface $datetimeEndLocal): self
    {
        $this->datetimeEndLocal = $datetimeEndLocal;

        return $this;
    }

    public function getTimezoneEnd(): ?string
    {
        return $this->timezoneEnd;
    }

    public function setTimezoneEnd(string $timezoneEnd): self
    {
        $this->timezoneEnd = $timezoneEnd;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
    

}
