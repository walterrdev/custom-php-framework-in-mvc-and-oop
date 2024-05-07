<?php
/**
 * Post model
 * 
 * Se encarga de conectarse a la BD y realizar las consultas.
 */
class Post
{
    /**
     * Propiedades
     */
    private $db;

    /**
     * Métodos
     */
    // Constructor
     public function __construct()
    {
        $this->db = new DbConnection;
    }

    public function getPosts()
    {
        $this->db->query("SELECT * FROM posts");

        return $this->db->getRecords();
    }
}