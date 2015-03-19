<?php

/**
 * Identifies a file on SVN.
 *
 * User: Cassio dos Santos Sousa
 */
class FileOnSVN {
    var $path;
    var $kind;
    var $name;
    var $size;
    var $revision;
    var $author;
    var $date;

    function FileOnSVN($path, $kind, $name, $size, $revision, $author, $date){
        $this->path = $path;
        $this->kind = $kind;
        $this->name = $name;
        $this->size = $size;
        $this->revision = $revision;
        $this->author = $author;
        $this->date = $date;
    }
}