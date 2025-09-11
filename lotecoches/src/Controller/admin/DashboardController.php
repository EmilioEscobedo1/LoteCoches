<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class DashboardController extends AppController
{
    public function index()
    {
        $vehiculosTable = TableRegistry::getTableLocator()->get('Vehiculos');
        $sucursalesTable = TableRegistry::getTableLocator()->get('Sucursales');
        $usersTable = TableRegistry::getTableLocator()->get('Users');

        $vehiculos = $vehiculosTable->find()->all();
        $sucursales = $sucursalesTable->find()->all();
        $users = $usersTable->find()->all();

        $this->set(compact('vehiculos', 'sucursales', 'users'));
        
    }
}