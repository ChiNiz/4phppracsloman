<?php
include('db/magazine-repository.php');

header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(MagazineRepository::read());
        break;
    case 'POST':
        $newMagazine = json_decode(file_get_contents('php://input'));
        MagazineRepository::create($newMagazine->name, $newMagazine->price);
        break;
    case 'PUT':
        $newMagazine = json_decode(file_get_contents('php://input'));
        echo MagazineRepository::update($newMagazine->id, $newMagazine->name, $newMagazine->price);
        break;
    case 'DELETE':
        $oldMagazine = json_decode(file_get_contents('php://input'));
        echo MagazineRepository::delete($oldMagazine->id);
        break;
    }
    ?>