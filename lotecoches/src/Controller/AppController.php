<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');

        // Layouts según prefijo y acción
        $prefix = $this->request->getParam('prefix');
        $action = $this->request->getParam('action');
        $controller = $this->getName();

        if ($prefix === 'Admin') {
            $this->viewBuilder()->setLayout('admin');
        } elseif ($controller === 'Users' && in_array($action, ['login', 'add'])) {
            $this->viewBuilder()->setLayout('login'); // login + registro
        } else {
            $this->viewBuilder()->setLayout('public'); // landing page
        }
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Acciones públicas
        $this->Authentication->addUnauthenticatedActions(['login', 'add', 'display', 'home']);
    }
}