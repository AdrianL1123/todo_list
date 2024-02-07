<?php

class DB
{
    public $host = 'devkinsta_db';
    public $dbname = 'TODO_list';
    public $dbuser = 'root';
    public $dbpassword = 'f9Rry0z7a1HO6o38';

    private function connectToDB()
    {
        return new PDO(
            "mysql:host=$this->host;dbname=$this->dbname",
            $this->dbuser,
            $this->dbpassword
        );
    }

    public function fetchAll( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
        return $query->fetchAll();
    }

    public function fetch( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
        return $query->fetch();
    }

    public function add( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
    }

    public function update( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
    }

    public function delete( $sql, $params )
    {
        $query = $this->connectToDB()->prepare( $sql );
        $query->execute($params);
    }

}