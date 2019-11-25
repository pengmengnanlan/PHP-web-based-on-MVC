<?php
class TaskControllerJSON{
	private $model;
    public function __construct()    {
		$this->model=new TaskModel();
    }

    public function getTasks(){
        //encode as json data.
        echo json_encode($this->model->getTasks()); 
    }

    public function getTaskById($id){
        echo json_encode($this->model->getTaskById($id));
    }    

    public function updateTask(){       
        //create stdClass and set it's properties
        $task=new stdClass();
        $task->id=$_POST['id'];
        $task->name=$_POST['name'];
        $task->description=$_POST['description'];
        $task->category=$_POST['category'];
        $task->is_done=$_POST['is_done'];

        $this->model->updateTask($task);
        
        echo json_encode(array("response"=>"Updated task ".$_POST['id']));
    }

    public function addTask(){
        $task=new stdClass();
        $task->name=$_POST['name'];
        $task->description=$_POST['description'];
        $task->category=$_POST['category'];
        $task->time=$_POST['time'];
        $task->grade=$_POST['grade'];

        $this->model->addTask($task);
        
        echo json_encode(array("response"=>"Added task ".$_POST['name']));
    }    
    
    public function deleteTaskById($id){
        $this->model->deleteTaskById($id);	
        echo json_encode(array("response"=>"Deleted task ".$id));
    }

    public function finishTaskById($id){
        $task = $this->model->getTaskById($id);
        $task->is_done='TRUE';
        $this->model->updateTask($task);
        echo json_encode(array("response"=>"Updated task ".$id));
    }

    public function refreshTaskById($id){
        $task = $this->model->getTaskById($id);
        $task->is_done='FALSE';
        $this->model->updateTask($task);
        echo json_encode(array("response"=>"Updated task ".$id));
    }

    public function getAllCategories(){
        echo json_encode($this->model->getAllCategory());
    }

    public function getTasksByCategory($category){
        echo json_encode($this->model->getTasksByCategory($category));
    }

    public function getFinishedTask() {
        echo json_encode($this->model->getFinishedTask());
    }

    public function getUnfinishedTask() {
        echo json_encode($this->model->getUnfinishedTask());
    }
    
}

?>