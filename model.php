<?php
include ('connect.php');
class model{
    public function all(){
      /*  $stmt=$conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $users=$stmt->fetchAll(); */
        global $conn; // get the variable conn from outside function
        $table=get_class($this); // get the table name from the name of class
        // which the object is extened from
        $stmt=$conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        $data=$stmt->fetchAll();
        return $data;
    }
    public function find($id){
        global $conn; // get the variable conn from outside function
        $table=get_class($this); // get the table name from the name of class
        // which the object is extened from
        $stmt=$conn->prepare("SELECT * FROM $table WHERE id='$id'");
        $stmt->execute();
        $data=$stmt->fetch();
        return $data;
    }
    public function insert($value,$execute){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("INSERT INTO $table $value");
        $stmt->execute($execute);
        // $value = (userName,email,password) VALUES (?,?,?)
        // $execute = array($userName,$email,$password)
    }
    public function update($set, $execute){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("UPDATE $table SET $set WHERE id=?");
        $stmt->execute($execute);
        // $set = userName=? , email=?
        // $execute = array($userName,$email , $id)
    }
    public function delete($id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("DELETE FROM $table WHERE id='$id'");
        $stmt->execute();
    }

}

class users extends model{

}
// $userObject=new users();
// print_r($userObject->all());
// print_r($userObject->find(8));
/* $userObject->insert(
    '(userName,email,password) VALUES (?,?,?)',
    array('mona','mona@gmail.com','123456')
); */
/* $userObject->update('userName=? , email=?',
    array('mona2','mona2@gmail.com' , 11)
); */
// $userObject->delete(11);



