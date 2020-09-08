<?php
class database{
    public $_conn;
    public $_sql = '';
    public $_cursor = NULL;
    private $dsn = 'mysql:host=localhost;dbname=xeploaiccvc;charset=utf8';
    private $username = 'root';
    private $password = '';
    
    public function database() {
        try {
            $this->_conn = new PDO($this->dsn, $this->username, $this->password);
            $this->_conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch(PDOException $e) {
            echo "ERROR! Lỗi kết nối CSDL";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
        }
    }
    
    public function setQuery($sql) {
        $this->_sql = $sql;
    }
    
    //Function execute the query 
    public function execute($options=array()) {
        $this->_cursor = $this->_conn->prepare($this->_sql);
        if($options) {  //If have $options then system will be tranmission parameters
            for($i=0;$i<count($options);$i++) {
                $this->_cursor->bindParam($i+1,$options[$i]);
            }
        }
        $this->_cursor->execute();
        return $this->_cursor;
    }
    
    //Funtion load datas on table
    public function loadAllRows($options=array()) {
        if(!$options) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($options))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    
    //Funtion load 1 data on the table
    public function loadRow($option=array()) {
        if(!$option) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }
    
    //Function count the record on the table
    public function loadRecord($option=array()) {
        if(!$option) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_COLUMN);
    }
    
    public function getLastId() {
        return $this->_conn->lastInsertId();
    }
    
    public function disconnect() {
        $this->_conn = NULL;
    }
}
?>  