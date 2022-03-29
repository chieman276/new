<?php

namespace controllers;
include './models/principalModel.php';
use principalModel;


class principalController
{
    public function index()
    {
        $principalModel = new principalModel();
        $principals = $principalModel->getAll();

        include_once './views/principal/index.php';
    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $principalModel = new principalModel();
            $principalModel->store($_REQUEST);

            header('location:index.php?controller=principal&action=index');
        }

        include_once './views/principal/add.php';
       
    }


    public function delete()
    {
        $id = $_REQUEST['id'];
        $principalModel = new principalModel();
        $principalModel->destroy($id);

        header('location:index.php?controller=principal&action=index');
    }


    public function edit()
    {
        $id = $_REQUEST['id'];
        $principalModel = new principalModel();
        $principal = $principalModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $principalModel = new principalModel();
            $principalModel->update($id, $_REQUEST);

            header('location:index.php?controller=principal&action=index');
        }
        include_once './views/principal/edit.php';
    }


    public function show()
    {
        $id = $_REQUEST['id'];
        $principalModel = new principalModel();
        $principal = $principalModel->find($id);
        $objPrincipals = $principalModel->detail($id,$_REQUEST);

        include_once './views/principal/show.php';
        
    }
}
