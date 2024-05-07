<?php
/**
 * Clase para la conexión a la base de datos con PDO
 */
class DbConnection
{
    /**
     * Properties for class
     */
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pwd = DB_PASSWORD;
    private $db = DB_NAME;
    
    private $dbh;       // DB handle
    private $stmt;      // Statement
    private $error;

    /**
     * Methods
     */
    // Constructor
    public function __construct()
    {
        // Crear string de conexión a la BD
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;

        // Opciones de conexión PDO
        $db_options = array(
            PDO::ATTR_PERSISTENT => true,       // Hace la conexión pensistente lo que optimiza recursos.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            // Connection config
            $this->dbh = new PDO(
                $dsn,
                $this->user,
                $this->pwd,
                $db_options
            );

            // Arreglar error con caractéres especiales
            $this->dbh->exec('set names utf8');
        } catch (PDOException $e) {
            // Obtener error que ocurra en la conexión
            $this->error = $e->getMessage();
            
            // Show error / Mostrar error
            echo $this->error;
        }
    }

    /**
     * Preparar consulta SQL
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Vincular valores con la consulta SQL
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                
                default:
                    $type = PDO::PARAM_STR;
                break;
            }

            $this->stmt->bindValue($param, $value, $type);
        }
    }

    /**
     * Ejecutar consulta SQL
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * Obtener registros
     */
    public function getRecords()
    {    
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Obtener registro
     */
    public function getRecord()
    {    
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Obtener cantidad de filas
     */
    public function getRowCount()
    {    
        $this->execute();
        return $this->stmt->rowCount();
    }
}
