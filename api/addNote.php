<?php

//include_once '../Repository/NoteRepository.php';
include_once '../Models/Note.php';
include_once '../Repository/NoteRepository.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


if (isSet($_GET['title']) && $_GET['content']) {

    $title = $_GET['title'];
    $content = $_GET['content'];

    $note = new Note(null, $title, $content);
    $obj = new NoteRepository();
    $obj->addNote($note);


} else {
    echo json_encode(['error' => 'not found data']);
}

