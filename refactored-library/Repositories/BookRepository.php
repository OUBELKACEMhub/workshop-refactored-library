<?php
namespace Repositories;

require_once __DIR__ . '/../Core/Database.php'; 
require_once __DIR__ . '/../Entities/Book.php';
require_once __DIR__ . '/../Entities/Author.php';
use PDO;
use Core\Database; 
use Entities\Book;

class BookRepository {
private $pdo;

    public function __construct() {
       $this->pdo = Database::getInstance()->getConnection();
    }

    public function findBooks(): array {
        $books = [];
        $db = \Core\Database::getInstance(); 
    $pdo = $db->getConnection();
        $sql = "SELECT * FROM books";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        foreach ($rows as $row) {
            $books[] = new Book($row['title'], $row['author_id'], (float)$row['price'], (int)$row['stock'], (int)$row['id']);
        }
        return $books;
    }

    public function findbookByTitle(string $title):Book {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE title = ?");
        $stmt->execute([$title]);
        $row = $stmt->fetch();
        
        if ($row) {
            return new Book($row['title'], $row['author_id'], $row['price'], $row['stock'], $row['id']);
        }
        return null;
    }

    public function addBook(Book $book): void {
        $sql="INSERT INTO books (title, author_id, price, stock) VALUES (?, ?, ?, ?)";
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
