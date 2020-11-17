<?php

include_once '../Repository/NoteRepository.php';


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$noteRepository = new NoteRepository();
$data = $noteRepository->getAllNotes();

echo json_encode($data);
