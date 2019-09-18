<?php 

    class Model {
        private $localhost  =   "localhost";
        private $username   =   "root";
        private $password;
        private $database   =   "bookstore";
        private $conn;
        
        // Connecting to database
        public function __construct(){
            try {
                $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->database); 
            } catch (Exception $e) {
                echo "Connection failed" . $e->getMessage();
            }
        } // function construct

        public function insert() {
            if(isset($_POST["submit"])){
                // inserting into database
                if(isset($_POST['title']) && isset($_POST['isbn']) && isset($_POST['author']) && isset($_POST['category']) && isset($_POST['publisher'])) {
                    
                    if(!empty($_POST['title']) && !empty($_POST['isbn']) && !empty($_POST['author']) && !empty($_POST['category']) && !empty($_POST['publisher']) ) {

                        $title  =   $_POST['title'];
                        $isbn   =   $_POST['isbn'];
                        $author =   $_POST['author'];
                        $category  =   $_POST['category'];
                        $publisher  =   $_POST['publisher'];

                        $query = "INSERT INTO bookTbl (title, isbn, author, category, publisher) 
                        VALUES ('$title', '$isbn', '$author', '$category', '$publisher')";
                        if($query_run = $this->conn->query($query)) {
                            echo "<script>alert('Book successfully added');</script>";
                            echo "<script>window.location.href = 'index.php';</script>";
                        } else {
                            echo '<script>alert("All fields are required"); </script>';
                            echo "<script>window.location.href = 'index.php';</script>";
                        }

                    } else {
                        echo '<script>alert("failed!"); </script>';
                        echo "<script>window.location.href = 'index.php';</script>";
                    } // no empty field

                }// if field set

            } // if form submitted
        } // function insert
        public function fetch() {
            $data = null;

            $query = "SELECT * FROM bookTbl";
            if($query_run = $this->conn->query($query) ){
                while($row = mysqli_fetch_assoc($query_run)) {
                    $data[] = $row;
                }
            }
            return $data;
        } // function fetch
        public function delete($id) {

            $query = "DELETE FROM bookTbl WHERE id = '$id'";
            if ($query_run = $this->conn->query($query)) {
                return true;
            } else {
                return false;
            }
        } // function delete
        public function find() {
            if(isset($_POST['submit'])){
                if(isset($_POST['findisbn'])) {
                    $findisbn = $_POST['findisbn'];
                    $data = null;
                    $query = "SELECT * FROM bookTbl WHERE isbn = '$findisbn'";
                    if($query_run = $this->conn->query($query)) {
                        if($query_run->num_rows == 0 ) {
                            echo '<script>alert("ISBN Number doesn\'t exist!"); </script>';
                            echo "<script>window.location.href = 'find.php';</script>";
                        }
                        while($row = mysqli_fetch_array($query_run)) {
                           $data = $row;
                        }
                    } 
                    return $data;
                }
            }
        } // function find
        public function edit($id) {
            
            $data = null;

            $query = "SELECT * FROM bookTbl WHERE id = '$id'";
            if($query_run = $this->conn->query($query)) {
                while($row = $query_run->fetch_assoc()){
                    $data = $row;
                }
            }
            return $data;
        } // function edit

        public function update($data) {
           
            $query = "UPDATE bookTbl SET title='$data[title]', isbn='$data[isbn]', author='$data[author]', category='$data[category]', publisher='$data[publisher]' WHERE id = '$data[id]'";
            if($query_run = $this->conn->query($query)){
                return true;
            } else {
                return false;
            }
        } // function update
    } // class Model
?>