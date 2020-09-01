<?php

namespace App {

    use PDO;

    class DBEngine
    {
        private $dbconnector = null;
        private $dbh = null;
        private $tableName = null;
        function __construct($table)
        {
            $this->dbconnector =  DBConnector::getInstance();
            $this->dbh = DBConnector::getInstance();
            $table = mb_strtolower($table);
            if ($this->isTableExists($table) == true) {
                $this->tableName = $table;
            }
        }
        public function isTableExists($table)
        {
            $query = "SHOW TABLES";
            $result = $this->dbh->query($query, PDO::FETCH_ASSOC)->fetchAll();
            if (count($result) > 0) {
                $baseName = 'Tables_in_' . mb_strtolower(DB_NAME);
                for ($i = 0; $i < count($result); $i++) {
                    if (strcasecmp($table, $result[$i][$baseName]) == 0) {
                        return true;
                    }
                }
            }
            return false;
        }
        public function getId($filter = [])
        {
            $query = "SELECT id FROM " . $this->tableName . " WHERE ";
            foreach ($filter as $key => $value) {
                if ($value == null) {
                    $query .= "$key IS NULL AND ";
                } else {
                    $query .= "$key = '$value' AND ";
                }
            }
            $query = mb_substr($query, 0, mb_strlen($query) - 4);
            $sth = $this->dbh->prepare($query);
            $sth->execute();
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            if($row!= false){
                return $row['id'];
            }
            return null;
        }
        public function getOneRow($id)
        {
            $sth = $this->dbh->prepare("SELECT * FROM " . $this->tableName . " WHERE id=:id");
            $sth->bindParam(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC);
        }
        public function getManyRows($filter = [], $order = 'ASC', $by = 'id', $min = 0, $max = 100)
        {
            $query = "SELECT * FROM " . $this->tableName . " WHERE ";
            foreach ($filter as $key => $value) {
                if ($value == null) {
                    $query .= "$key IS NULL AND ";
                } else {
                    $query .= "$key = '$value' AND ";
                }
            }
            $query = mb_substr($query, 0, mb_strlen($query) - 4);
            $query .= " ORDER BY $by $order LIMIT $min, $max";
            $sth = $this->dbh->prepare($query);
            $sth->execute($filter);
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        public function addRow($data = [])
        {
            $query = "INSERT INTO " . $this->tableName . " ( ";
            $fields = "";
            $values = "";
            foreach ($data as $key => $value) {
                $fields .= $this->tableName . ".$key, ";
                if ($value == null) {
                    $values .= "NULL, ";
                } else {
                    $values .= "'$value', ";
                }
            }
            $query .= $fields;
            $query = mb_substr($query, 0, mb_strlen($query) - 2);
            $query .= ") VALUES (";
            $query .= $values;
            $query = mb_substr($query, 0, mb_strlen($query) - 2);
            $query .= ")";
            $sth = $this->dbh->prepare($query);
            $sth->execute();
            if($sth->rowCount() == 1){
                return true;
            } else {
                return false;
            }
        }
        public function deleteRow($id)
        {
            $sth = $this->dbh->prepare("DELETE FROM " . $this->tableName . " WHERE id=:id LIMIT 1");
            $sth->bindParam(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            if($sth->rowCount() == 1){
                return true;
            } else {
                return false;
            }
        }
        public function updateRow($id, $data = [])
        {
            $query = "UPDATE " . $this->tableName . " SET ";
            foreach ($data as $key => $value) {
                if ($value == null) {
                    $query .= "$key = NULL, ";
                } else {
                    $query .= "$key = '$value', ";
                }
            }
            $query = mb_substr($query, 0, mb_strlen($query) - 2); //удалить 2 последных елемента
            $query .= " WHERE id=$id";
            $sth = $this->dbh->prepare($query);
            $sth->execute();
            if($sth->rowCount() == 1){
                return true;
            } else {
                return false;
            }
        }
        protected function executeQuery($query){
            $sth = $this->dbh->prepare($query);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        public function __destruct()
        {
            unset($this->connector);
            unset($this->dbh);
        }
    }
}
