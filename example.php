<?php
    require 'student.php';
    $student = new student();
      if (isset($_POST['action'])){
      if($_POST['action'] == 'fetch'){
        $data = $student->all(); 
       foreach ($data as $row){
         echo "
               <tr>
                  <td>{$row['fullname']}</td>
                  <td>{$row['course']}</td>
               <td>
                <button class='btn btn-sm btn-warning edit'
                  data-id='{$raw['id']}'
                  data-fullname='{$raw['fullname']}'
                  data-course='{$raw['course']}'>Edit</button>
                <button class='btn btn-sm btn-danger delete'
                  data-id='{$raw['id']}'>Delete</button>
               </td>
            </tr>";
       }
      exit;
      }
    if($_POST['action'] == 'store'){
     $student->store($_POST['fullname'],$_POST['course']);
     exit;
    }
    if($_POST['action'] == 'update'){
     $student->update($_POST['id'],$_POST['fullname'],$_POST['course']);
     exit;
    }
    if($_POST['action'] == 'delete'){
     $student->delete($_POST['id']);
     exit;
    }
    }






?>








<?php
 class database{
    public function connect(){
       return new mysqli('localhost','root','','student_oop_crud_db');
    }
 }



?>











<?php
require 'student.php';
class student {
private $db; 
}
public function __construct(){
$this->db = (new database())->connect();
}
public function all(){
$this->db->query("SELECT * FROM student OVER BY id DESC");
}
public function store($name,$course){
    $stmt = $this->db->prepare("INSERT INTO student (fullname,course) VALUE (?,?)")
}






?>