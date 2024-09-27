<?php
// $conn=mysqli_connect('localhost', 'root','root','c3p_project');
class DBConnection{
    private $localhost='localhost';
    private $username='root';
    private $password='root';
    private $database='c3p_project';
    public $DB;
    function __construct(){
       $this->DB=mysqli_connect($this->localhost,$this->username,$this->password,$this->database);
       return $this->DB;
    }
    function select($table,$field="*"){
      return "SELECT $field FROM $table";
    }
    function selectOne($table,$field="*",$condition){
        return "SELECT $field FROM $table WHERE $condition";
    }
    function delete($table,$condition){
        return "DELETE FROM $table WHERE $condition";
    }

}
$conn=new DBConnection();

?>