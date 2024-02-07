<?php
class config
    {
        private $HOST = "127.0.0.1";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DB_NAME = "php";
        public $connect;

        private $table_name = "movies";

        public function __construct()
        {
        $this->connect = mysqli_connect($this->HOST,$this->USERNAME,$this->PASSWORD,$this->DB_NAME);

        if($this->connect)
        {
            
        }
        else
        {
            echo "Connection Fail....!!";
        }
        }

        public function insert($name,$release_year,$imdb,$duration)
        {
            $query = "INSERT INTO $this->table_name (name,release_year,imdb,duration) VALUES ('$name',$release_year,$imdb,$duration)";

            $res = mysqli_query($this->connect,$query);

            if($res)
            {
                echo "$res: Inserted Successfully.....";
            }
            else{
                echo "Failed...";
            }

            return $res;
        }

        public function getAllData()
        {
            $query = "SELECT * FROM $this->table_name";

            $res = mysqli_query($this->connect,$query);

            return $res;
        }

        public function getSingleData($id) {
            $query = "SELECT * FROM $this->table_name WHERE id=$id";
            return mysqli_query($this->conn,$query);
        }

        public function delete($id) {
            $query = "DELETE FROM $this->table_name WHERE id=$id";
            return mysqli_query($this->connect,$query);  
        }

        public function update($id,$name,$release_year,$imdb,$duration)
        {
            $query = "UPDATE $this->table_name SET name='$name',release_year=$release_year,imdb=$imdb,duration=$duration WHERE id=$id";
            return mysqli_query($this->connect,$query);
        }
    
    }
?>