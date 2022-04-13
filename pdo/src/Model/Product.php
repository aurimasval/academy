<?php

namespace Application\Model;

class Product
{
    private ?int $id;

    private ?string $name;

    private ?string $sku;

    private ?string $description;

    private ?float $price;

    private ?int $quantity;

    private ?int $status;

    private ?int $deleted;

    private ?string $created_at;

    private ?string $modified_at;

    private ?string $deleted_at;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getDeleted(): ?int
    {
        return $this->deleted;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @return string|null
     */
    public function getModifiedAt(): ?string
    {
        return $this->modified_at;
    }

    /**
     * @return string|null
     */
    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }
}