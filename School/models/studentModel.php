<?php
include_once './db.php';
class studentModel
{

    public function getAll()
    {
        global $connect;
        $sql = "SELECT students.*,teachers.name AS teacherName FROM `students` JOIN teachers ON teachers.id = students.teacherID";

        $stmt = $connect->query($sql);

        //thiết lập kiểu dữ liệu trả về

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $rows = $stmt->fetchAll();

        return $rows;
    }

    public function find($id)
    {
        global $connect;
        $sql = "SELECT students.*,teachers.name AS teacherName FROM `students` JOIN teachers ON teachers.id = students.teacherID";

        $stmt = $connect->query($sql);

        //thiết lập kiểu dữ liệu trả về

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $row = $stmt->fetch();

        return $row;
    }

    public function search($search)
    {
        global $connect;
        $sql = "SELECT students.*,teachers.name AS teacherName FROM `students` JOIN teachers ON teachers.id = students.teacherID 
        
        WHERE students.`name` LIKE '%$search%'";
        // $sql = "SELECT * FROM products WHERE tenhang LIKE '" .'%'.$_POST['search'].'%'."'";
        $stmt = $connect->query($sql);

        //thiết lập kiểu dữ liệu trả về

        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $rows = $stmt->fetchAll();

        return $rows;

    }

    public function store($data)
    {
        global $connect;
        $name = $data['name'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $position = $data['position'];
        $teacherID = $data['teacherID'];
        $sql = "INSERT INTO `students` (`name`, `gender`, `birthday`, `position`, `teacherID`) 
        VALUES (
            '" . $data['name'] . "',
            '" . $data['gender'] . "',
            '" . $data['birthday'] . "',
            '" . $data['position'] . "',
            '" . $data['teacherID'] . "'
            )";
        $connect->query($sql);
    }
    public function update($id, $data)
    {
        global $connect;
        $name = $data['name'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $position = $data['position'];
        $teacherID = $data['teacherID'];
        $sql = "UPDATE `students` SET 
        `name` = '$name',
        `gender` = '$gender',
        `birthday` = '$birthday',
        `position` = '$position',
        `teacherID` = '$teacherID' 
        WHERE `students`.`id` = $id";

        $connect->query($sql);
    }
    public function destoy($id)
    {
        global $connect;
        $sql = "DELETE FROM `students` WHERE `students`.`id` = $id";

        $connect->query($sql);
    }
}
