<?php

include_once 'Repository/NoteRepository.php';
include_once 'Models/Note.php';

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

//echo json_encode(['message' => 'test']);
$note = new Note(null, 'ttt', 'ttt');
$obj = new NoteRepository();
$obj->addNote($note);




