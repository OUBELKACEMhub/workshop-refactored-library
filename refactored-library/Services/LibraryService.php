<?php
namespace Services;
require_once __DIR__ . '/../Repositories/BookRepository.php';
use Repositories\BookRepository;
use Entities\Book;
use Exception;

class LibraryService {
    private BookRepository $repository;

    public function __construct() {
        $this->repository = new BookRepository();
    }

   public function display_books():void{
    $allBooks=$this->repository->findBooks();
    if(!$allBooks){
        echo "no book founded!";
    }
    foreach($allBooks as $book){
        echo "title:".$book->getTitle() . "    author:". $book->getAuthor_id(). "\n";
    }
   }


}

$obj =new  LibraryService();
$obj->display_books();