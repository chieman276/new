<?php
include_once './models/studentModel.php';
class studentController
{
    public function index()
    {
        $studentModel = new studentModel();
        $students = $studentModel->getAll();

        include_once './views/students/index.php';
    }
    public function renderView($path, $params = [])
    {
        extract($params);
        include 'views' . $path;
    }
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $studentModel = new studentModel();
            $studentModel->store($_REQUEST);

            header('location:index.php?controller=student&action=index');
        }
        include_once './views/students/add.php';
    }
    public function edit()
    {
        $id = $_REQUEST['id'];
        $studentModel = new studentModel();
        $student = $studentModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $studentModel->update($id, $_REQUEST);

            header('location:index.php?controller=student&action=index');
        }
        include_once './views/students/edit.php';
    }
    public function delete()
    {
        $id = $_REQUEST['id'];
        $studentModel = new studentModel();
        $studentModel->destoy($id);

        header('location:index.php?controller=student&action=index');
    }
    public function show()
    {
        $id = $_REQUEST['id'];
        $studentModel = new studentModel();
        $student = $studentModel->find($id);


        include_once './views/students/show.php';
    }

    public function search_name(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $search = $_REQUEST['search'];     
            $studentModel = new studentModel();
            $students = $studentModel->search($search);

            if ($students == null) {
                $error = "Không tìm thấy kết quả nào";
            } else {
                $error = '';
            }
            $params = [
                'students' => $students,
                'error' => $error
            ];
            $this->renderView("/students/search.php", $params);
            
        
        }

    }

}
