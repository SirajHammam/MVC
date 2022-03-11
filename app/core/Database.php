<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true, // menjaga koneksi database terjaga 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // kalo ada error
        ];

        try{
            $this->dbh =  new PDO($dsn, $this->user, $this->pass, $option);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // membuat database menjadi fleksible
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Menghindari SQL injection (Aman)
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch ( true ) {
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
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    // manggil (sintak eksekusi pemanggilan data)
    public function execute() 
    {
        $this->stmt->execute();
    }
    
    // KALAU MAU BANYAK DATA YANG MAU DI PANGGIL ( select * from )
    public function resultSet() 
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function single() 
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() 
    {
        return $this->stmt->rowCount(); 
    }





}