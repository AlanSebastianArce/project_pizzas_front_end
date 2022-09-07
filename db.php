<?php

/**
 * Clase para manejar Base de Datos usando PDO
 * 
 * @author Alan Sebastian Arce <alanarce.fceyn.uba@gmail.com>
 * @link https://github.com/AlanSebastianArce/project_pizzas_front_end
 * @version 0.1
 * @copyright 2022 AlanSebastianArce
 */

class Db
{
    private $connection;

    /**
     * Establecer una conexion.
     * @return connection
     */

    public function __construct()
    {
        try {

            $dsn = "mysql:dbname=" . DATABASE_NAME . ";host=" . SERVER_NAME;

            $this->connection = new PDO($dsn, USER_NAME, PASSWORD);

        } catch(PDOException $e){
            
            die("Conexion Fallida");
          }
        
        return $this->connection;
        
    }

    /**
     * Prepara una query sql
     * @return object
     */

    public function prepare($query){

        return $this->connection->prepare($query);
    }

    /**
     * Ejecuta una sql query
     * @param string $query
     * @return object
     */

    public function query()
    {
        return $this->connection->query($query);
    }

    /**
     * Cierra una conexion
     * @return mixed
     */

    public function close()
    {
        $this->connection=null;
    }
}