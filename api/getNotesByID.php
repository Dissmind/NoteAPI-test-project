<?php

include_once '../Repository/NoteRepository.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (isSet($_GET['id'])) {
    $id = $_GET['id'];

    $noteRepository = new NoteRepository();
    $data = $noteRepository->getNotesByID($id);

    echo json_encode($data);
} else {
    echo json_encode(['error' => 'id is not found']);
}


