<?php
    class Question{
        private $conn;

        public $id;
        public $title;
        public $question_a;
        public $question_b;
        public $question_c;
        public $question_d;
        public $correct;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = "SELECT * FROM question ORDER BY id ASC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function show(){
            $query = "SELECT * FROM question WHERE id=? LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->title = $row['title'];
            $this->question_a = $row['question_a'];
            $this->question_b = $row['question_b'];
            $this->question_c = $row['question_c'];
            $this->question_d = $row['question_d'];
            $this->correct = $row['correct'];
        }

        public function create(){
            $query = "INSERT INTO question SET title=:title, question_a=:question_a, question_b=:question_b, question_c=:question_c, question_d=:question_d, correct=:correct";
            $stmt = $this->conn->prepare($query);

            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->question_a = htmlspecialchars(strip_tags($this->question_a));
            $this->question_b = htmlspecialchars(strip_tags($this->question_b));
            $this->question_c = htmlspecialchars(strip_tags($this->question_c));
            $this->question_d = htmlspecialchars(strip_tags($this->question_d));
            $this->correct = htmlspecialchars(strip_tags($this->correct));
            

            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':question_a', $this->question_a);
            $stmt->bindParam(':question_b', $this->question_b);
            $stmt->bindParam(':question_c', $this->question_c);
            $stmt->bindParam(':question_d', $this->question_d);
            $stmt->bindParam(':correct', $this->correct);
            
            if($stmt->execute()){
                return true;
            }
            printf("Error %s. \n" ,$stmt->error);
            return false;
        }

        public function update(){
            $query = "UPDATE question SET title=:title, question_a=:question_a, question_b=:question_b, question_c=:question_c, question_d=:question_d, correct=:correct WHERE id=:id";
            $stmt = $this->conn->prepare($query);

            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->question_a = htmlspecialchars(strip_tags($this->question_a));
            $this->question_b = htmlspecialchars(strip_tags($this->question_b));
            $this->question_c = htmlspecialchars(strip_tags($this->question_c));
            $this->question_d = htmlspecialchars(strip_tags($this->question_d));
            $this->correct = htmlspecialchars(strip_tags($this->correct));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':question_a', $this->question_a);
            $stmt->bindParam(':question_b', $this->question_b);
            $stmt->bindParam(':question_c', $this->question_c);
            $stmt->bindParam(':question_d', $this->question_d);
            $stmt->bindParam(':correct', $this->correct);
            $stmt->bindParam(':id', $this->id);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s. \n" ,$stmt->error);
            return false;
        }

        public function delete(){
            $query = "DELETE FROM question WHERE id=:id";
            $stmt = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':id', $this->id);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s. \n" ,$stmt->error);
            return false;
        }
    }
?>