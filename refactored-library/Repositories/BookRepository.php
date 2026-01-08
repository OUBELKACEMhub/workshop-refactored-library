<?php
namespace Repositories;

use Core\Database;
use Entities\Book;
use PDO;

class BookRepository {


    public function __construct() {}

    public function findBooks(): array {
        $pdo = Database::getConnection();
    
        $books = [];
        $sql="SELECT * FROM books";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetshAll();
        foreach ($rows as $row) {
            $books[] = new Book($row['title'], $row['author'], $row['price'], $row['stock'], $row['id']);
        }
        return $books;
    }

    public function findbookByTitle(string $title):Book {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE title = ?");
        $stmt->execute([$title]);
        $row = $stmt->fetch();
        
        if ($row) {
            return new Book($row['title'], $row['author'], $row['price'], $row['stock'], $row['id']);
        }
        return null;
    }

    public function addBook(Book $book): void {
        $sql="INSERT INTO books (title, author, price, stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $book->getTitle(),
            $book->getAuthor(),
            $book->getPrice(),
            $book->getStock()
        ]);
    }


    public function deleteBook($id){
        $sql="DELETE FROM books WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'=>$id
        ]);
    }


    
}

$obj=new BookRepository();
print_r($obj->findBooks());
