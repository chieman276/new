<?php

namespace controllers;

include_once './models/teacherModel.php';

use teacherModel;

class teacherController
{
    public function index()
    {
        $teacherModel = new teacherModel();
        $teachers = $teacherModel->getAll();

        include_once './views/teachers/index.php';
    }
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $teacherModel = new teacherModel();
            $teacherModel->store($_REQUEST);

            header('location: index.php?controller=teacher&action=index');
        }
        include_once './views/teachers/add.php';
    }
    public function edit()
    {
        $id = $_REQUEST['id'];
        $teacherModel = new teacherModel();
        $teacher = $teacherModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $teacherModel->update($id, $_REQUEST);

            header('location:index.php?controller=teacher&action=index');
        }
        include_once './views/teachers/edit.php';
    }
    public function delete()
    {

        $id = $_REQUEST['id'];
        $teacherModel = new teacherModel();
        $teacherModel->destroy($id);

        header('location:index.php?controller=teacher&action=index');
    }
    public function show()
    {
        $id = $_REQUEST['id'];
        $teacherModel = new teacherModel();
        $teacher = $teacherModel->find($id);
        $objTeacher = $teacherModel->detail($id, $_REQUEST);

        include_once './views/teachers/show.php';
    }
}
