<?php

namespace App\Models;  

use PDO;  

class BaseModel  
{  
    protected $pdo = NULL;  
    protected $sql = '';  
    protected $sta = NULL;  

    public function __construct()  
    {  
        // Gọi phương thức getConnect() để khởi tạo kết nối PDO  
        $this->pdo = $this->getConnect();  
    }  

    function getConnect()  
    {  
        // set connect  
        $pdo =  new PDO(  
            "mysql:host=" . DBHOST  
                . ";dbname=" . DBNAME  
                . ";charset=" . DBCHARSET,  
            DBUSER,  
            DBPASS  
        );  
        return $pdo;  
    }  

    function setQuery($sql)  
    {  
        $this->sql = $sql; // Gán câu truy vấn SQL vào biến lớp  
        return $sql;  
    }  

    function execute($options = array())  
    {  
        $this->sta = $this->pdo->prepare($this->sql);  
        if ($options) {  
            for ($i = 0; $i < count($options); $i++) {  
                $this->sta->bindParam($i + 1, $options[$i]);  
            }  
        }  
        $this->sta->execute();  
        return $this->sta;  
    }  

    function loadAllRows($options = array())  
    {  
        if (!$options) {  
            return $this->execute() ? $this->sta->fetchAll(PDO::FETCH_OBJ) : false;  
        } else {  
            return $this->execute($options) ? $this->sta->fetchAll(PDO::FETCH_OBJ) : false;  
        }  
    }  

    function loadRow($option = array())  
    {  
        if (!$option) {  
            return $this->execute() ? $this->sta->fetch(PDO::FETCH_OBJ) : false;  
        } else {  
            return $this->execute($option) ? $this->sta->fetch(PDO::FETCH_OBJ) : false;  
        }  
    }  

    public function getLastId() {  
        return $this->pdo->lastInsertId();  
    }  
}
