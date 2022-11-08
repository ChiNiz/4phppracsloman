<?php
include('db/book-repository.php');

header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(BookRepository::read());
        break;
    case 'POST':
        $newBook = json_decode(file_get_contents('php://input'));
        BookRepository::create($newBook->name, $newBook->price);
        break;
    case 'PUT':
        $newBook = json_decode(file_get_contents('php://input'));
        echo BookRepository::update($newBook->id, $newBook->name, $newBook->price);
        break;
    case 'DELETE':
        $oldBook = json_decode(file_get_contents('php://input'));
        echo BookRepository::delete($oldBook->id);
        break;
    }
    ?>