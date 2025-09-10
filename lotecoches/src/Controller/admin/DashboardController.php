<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class DashboardController extends AppController
{
    public function index()
    {
        // Ejemplo: cargar tablas horneadas
        $this->loadModel('Vehiculos');
        $this->loadModel('Sucursales');
        $this->loadModel('Users');

        $vehiculos = $this->Vehiculos->find()->all();
        $sucursales = $this->Sucursales->find()->all();
        $usuarios = $this->Users->find()->all();

        $this->set(compact('vehiculos', 'sucursales', 'usuarios'));

        // Layout opcional para admin
        $this->viewBuilder()->setLayout('admin');
    }
}