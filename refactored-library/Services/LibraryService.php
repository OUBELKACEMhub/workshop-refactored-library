<?php
namespace Services;
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
        echo "title:".$book['title'] . "author:". $book['author'];
    }
   }


   



}

$obj =new  LibraryService();
$obj->display_books();