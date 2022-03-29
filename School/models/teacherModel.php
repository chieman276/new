<?php
include './db.php';
class teacherModel{
    public function getAll(){

        global $connect;

        $sql = "SELECT teachers.*, principal.name AS principal_name FROM `teachers` JOIN principal ON principal.id = teachers.`principalID`";

        $stmt = $connect->query($sql);

        //thiết lập kiểu dữ liệu trả về
        
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $rows = $stmt->fetchAll();

        return $rows;

        
    }


    public function find($id){
        global $connect;

        $sql = "SELECT teachers.*, principal.name AS principal_name FROM `teachers` JOIN principal ON principal.id = teachers.`principalID`";

        $stmt = $connect->query($sql);

        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        //fetch se tra ve du lieu 1 ket qua
        $row = $stmt->fetch();

        return $row;

    }


    public function store($data){

        global $connect;
        $name = $data['name'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $position = $data['position'];
        $principalID = $data['principalID'];

        $sql = "INSERT INTO `teachers` (`name`, `gender`, `birthday`, `position`, `principalID`) VALUES
         (
             '".$data['name']."',
             '".$data['gender']."',
             '".$data['birthday']."',
             '".$data['position']."',
             '".$data['principalID']."'
        )";
        $connect->query($sql);
    }


    public function update($id, $data){
        global $connect;
        $name = $data['name'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $position = $data['position'];
        $principalID = $data['principalID'];

        $sql = "UPDATE `teachers` SET `name` = '$name',
         `gender` = '$gender',
         `birthday` = '$birthday',
         `position` = '$position' ,
         `principalID` = '$principalID' 
         WHERE `teachers`.`id` = $id;";

         $connect->query($sql);

    }


    public function destroy($id){
        global $connect;

        $sql = "DELETE FROM `teachers` WHERE `teachers`.`id` = $id";
        //thực thi câu lệnh sql
        $connect->query($sql);


    }


    public function detail($id){
        global $connect;

        $sql = "SELECT * FROM `teachers` WHERE id = $id";
        //thực thi câu lệnh sql
        $connect->query($sql);

    }
}
