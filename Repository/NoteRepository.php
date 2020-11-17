<?php

include_once '../DB/Database.php';
include_once '../Models/Note.php';

class NoteRepository {
    public function addNote(Note $note) {
        $db = new Database();
        $connection = $db->getConnection();

        $query = "INSERT INTO notes (id, title, content) VALUES (null,'"
            . $note->title
            . "', '" . "$note->content" . "')";

        $result = mysqli_query($connection, $query);
    }


    public function getAllNotes() {
        $db = new Database();
        $connection = $db->getConnection();

        $query = 'SELECT * FROM `notes`';

        $result = mysqli_query($connection, $query);

        $notes = [];

        if ($result) {
            $rows = mysqli_num_rows($result);

            for ($i = 0; $i < $rows; $i++) {
                $row = mysqli_fetch_row($result);

                $note = new Note($row[0], $row[1], $row[2]);
                array_push($notes, $note);
            }
        }

        return $notes;
    }


    public function getNotesByID($id) {
        $db = new Database();
        $connection = $db->getConnection();

        $query = 'SELECT * FROM `notes` WHERE id = ' . $id;

        $result = mysqli_query($connection, $query);

        $row = mysqli_fetch_row($result);

        $note = new Note($row[0], $row[1], $row[2]);

        return $note;
    }
}