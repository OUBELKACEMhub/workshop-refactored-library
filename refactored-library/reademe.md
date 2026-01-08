// script_procedural.php - Gestion d'une librairie
$books = [
['id' => 1, 'title' => 'PHP 8', 'author' => 'John Doe', 'price' => 29.99, 'stock' => 5],
['id' => 2, 'title' => 'OOP Mastery', 'author' => 'Jane Smith', 'price' => 39.99, 'stock' => 3]
];

function display_books($books) {
    foreach ($books as $book) {
        echo "{$book['title']} by {$book['author']} - {$book['price']}€ (Stock: {$book['stock']})\n";
}
}

function add_book(&$books, $title, $author, $price, $stock) {
    $id = count($books) + 1;
$books[] = ['id' => $id, 'title' => $title, 'author' => $author, 'price' => $price, 'stock' => $stock];
}

function find_book_by_title($books, $title) {
    foreach ($books as $book) {
        if (strtolower($book['title']) === strtolower($title)) {
return $book;
}
}
return null;
}
