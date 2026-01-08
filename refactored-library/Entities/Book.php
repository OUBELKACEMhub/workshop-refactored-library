<?php
namespace Entities;

class Book {
    private int $id;
    private string $title;
    private int $author_id;
    private float $price;
    private int $stock;

    public function __construct(string $title, string $author, float $price, int $stock, int $id = null) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        $this->stock = $stock;
        $this->id = $id;
    }

    public function getId(): int { 
        return $this->id; 
    }
    public function getTitle(): string { 
        return $this->title;
     }
    public function getAuthor_id(): string {
         return $this->author; 
        }
    public function getPrice(): float {
         return $this->price;
         }
    public function getStock(): int { 
        return $this->stock; 
    }

    public function __toString(): string {
        return "id: $this->id | $this->title by $this->author - $this->price avec un Stock: $this->stock";
    }
}
