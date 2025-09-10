<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Flash');
    }

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);
        // Permitir acceso a login y logout sin estar autenticado
        $this->Authentication->allowUnauthenticated(['login', 'logout']);
    }

    public function login()
    {
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $user = $result->getData();
            if (!empty($user->admin) && $user->admin == 1) {
                return $this->redirect(['controller' => 'Dashboard', 'action' => 'index', 'prefix' => 'Admin']);
            } else {
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Usuario o contraseña inválidos');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['action' => 'login']);
    }
}