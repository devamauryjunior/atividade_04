<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $usersModel =  new \App\Models\UsersModel();
        $getAllUser = $usersModel->getAllUsers();
        // var_dump($getAllUser);
        return view('index', ['usuarios' => $getAllUser]);
    }

    public function insertUser()
    {
        $usersModel =  new \App\Models\UsersModel();
        $senha = hash('md5', $_POST['senha']);
        $resultado = $usersModel->insertUser($_POST, $senha);
        $getAllUser = $usersModel->getAllUsers();
        $session = session();
        if($resultado) {
            $session->setFlashdata(['status' => "sucesso"]);
            return view('index', ['usuarios' => $getAllUser]);
        }
        $session->setFlashdata(['status' => "error"]);
        return view('index', ['usuarios' => $getAllUser]);

    }

    public function deleteUser($id)
    {
        $usersModel =  new \App\Models\UsersModel();
        $resultado = $usersModel->deleteDatesUser($id);
        $getAllUser = $usersModel->getAllUsers();
        $session = session();
        if($resultado) {
            $session->setFlashdata(['status' => "delete"]);
            return view('index', ['usuarios' => $getAllUser]);
        }
        $session->setFlashdata(['status' => "notdelete"]);
        return view('index', ['usuarios' => $getAllUser]);
    }
}
