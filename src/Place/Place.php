<?php

namespace App\Place;

class Place
{
    private $id;

    private $kind;

    private $name;

    private $description;

    private $datetimeStartUtc;

    private $datetimeStartLocal;

    private $timezoneStart;

    private $datetimeEndUtc;

    private $datetimeEndLocal;

    private $timezoneEnd;

    private $createdAt;

    private $updatedAt;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getKind(): ?string
    {
        return $this->kind;
    }

    public function setKind(string $kind): self
    {
        $this->kind = $kind;

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
}
