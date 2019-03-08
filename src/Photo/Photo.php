<?php

namespace App\Photo;

use App\Place\Place;

class Photo
{
    private $id;

    private $name;

    private $description;

    private $datetimeUtc;

    private $datetimeLocal;

    private $timezone;

    private $createdAt;

    private $updatedAt;

    private $place;

    public function getId(): ?string
    {
        return $this->id;
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

    public function getDatetimeUtc(): ?\DateTimeInterface
    {
        return $this->datetimeUtc;
    }

    public function setDatetimeUtc(\DateTimeInterface $datetimeUtc): self
    {
        $this->datetimeUtc = $datetimeUtc;

        return $this;
    }

    public function getDatetimeLocal(): ?\DateTimeInterface
    {
        return $this->datetimeLocal;
    }

    public function setDatetimeLocal(\DateTimeInterface $datetimeLocal): self
    {
        $this->datetimeLocal = $datetimeLocal;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

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

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }
}
