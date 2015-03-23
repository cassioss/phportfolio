<?php

/**
 * Identifies a file on SVN.
 */
class File
{
    var $name;
    var $revision;
    var $author;
    var $date;
    var $message;
    var $path;
    var $size;
    var $type;

    /**
     * Initializes an object for a file on SVN.
     *
     * @param $name
     * @param $revision
     * @param $author
     * @param $date
     * @param $message
     * @param $path
     * @param $size
     * @param $type
     */
    function __construct($name, $revision, $author, $date, $message, $path, $size, $type)
    {
        $this->name = $name;
        $this->revision = $revision;
        $this->author = $author;
        $this->date = $date;
        $this->message = $message;
        $this->path = $path;
        $this->size = $size;
        $this->type = $type;
    }
}