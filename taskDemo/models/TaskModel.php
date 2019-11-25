<?php
class TaskModel{
    private function getPDO(){
        // connect to the database which is stores in the same files with .php
        $pdoCon = new PDO('sqlite:./taskExam.db',null,null,null);
        return $pdoCon;
    }

    public function getTasks(){
        try{
            $pdo=$this->getPDO();
            $sqlAllTasks='SELECT * FROM task_info';
            $pdoStatement=$pdo->query($sqlAllTasks);
            $tasks=$pdoStatement->fetchAll(PDO::FETCH_OBJ);
            $pdo=null;
            return $tasks;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function getTaskById($id){
        try{
            $pdo=$this->getPDO();
            $sqlTaskById="SELECT * FROM task_info WHERE id=?";
            $pdoStatement=$pdo->prepare($sqlTaskById);
            $prodid=$id;
            $pdoStatement->bindParam(1,$prodid);
            $pdoStatement->execute();
            $task=$pdoStatement->fetch(PDO::FETCH_OBJ);
            $pdo=null;
            return $task;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function updateTask($task){
        try{
            $pdo=$this->getPDO();
            $sqlUpdate="UPDATE task_info SET name=?, description=?, category=?, is_done=? WHERE id=?";
            $pdoStatement=$pdo->prepare($sqlUpdate);
            $pdoStatement->bindParam(1,$task->name);
            $pdoStatement->bindParam(2,$task->description);
            $pdoStatement->bindParam(3,$task->category);
            $pdoStatement->bindParam(4,$task->is_done);
            $pdoStatement->bindParam(5,$task->id);

            $pdoStatement->execute();
            $pdo=null;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function deleteTaskById($id){
        try{
            $pdo=$this->getPDO();
            $sqlDelete="DELETE FROM task_info WHERE id=?";
            $pdoStatement=$pdo->prepare($sqlDelete);
            $pdoStatement->bindParam(1,$id);
            $pdoStatement->execute();
            $pdo=null;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function addTask($task){
        try{
            $pdo=$this->getPDO();
            $sqlUpdate="INSERT INTO task_info (name,description,category) VALUES(?,?,?)";
            $pdoStatement=$pdo->prepare($sqlUpdate);
            $pdoStatement->bindParam(1,$task->name);
            $pdoStatement->bindParam(2,$task->description);
            $pdoStatement->bindParam(3,$task->category);

            $pdoStatement->execute();
            $pdo=null;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function getTasksByCategory($category){
        try{
            $pdo=$this->getPDO();
            $sqlTasksByCategory="SELECT * FROM task_info WHERE category=?";
            $pdoStatement=$pdo->prepare($sqlTasksByCategory);
            $pdoStatement->bindParam(1,$category);
            $pdoStatement->execute();
            $tasks=$pdoStatement->fetchAll(PDO::FETCH_OBJ);
            $pdo=null;
            return $tasks;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function getAllCategory(){
        try{
            $pdo=$this->getPDO();
            $sqlAllCategory="SELECT DISTINCT(category) FROM task_info ";
            $pdoStatement=$pdo->query($sqlAllCategory);
            $categories=$pdoStatement->fetchAll(PDO::FETCH_OBJ);
            $pdo=null;
            return $categories;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function getFinishedTask(){
        try{
            $pdo=$this->getPDO();
            $sqlFinishedTask="SELECT * FROM task_info WHERE is_done = 'TRUE'";
            $pdoStatement=$pdo->query($sqlFinishedTask);
            $finishedTasks=$pdoStatement->fetchAll(PDO::FETCH_OBJ);
            $pdo=null;
            return $finishedTasks;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }

    public function getUnfinishedTask(){
        try{
            $pdo=$this->getPDO();
            $sqlUnfinishedTask="SELECT * FROM task_info WHERE is_done = 'FALSE'";
            $pdoStatement=$pdo->query($sqlUnfinishedTask);
            $unfinishedTasks=$pdoStatement->fetchAll(PDO::FETCH_OBJ);
            $pdo=null;
            return $unfinishedTasks;
        }catch(PDOException $e){
            echo 'PDO Connection Failed: '.$e->getMessage();
        }
    }
}
?>