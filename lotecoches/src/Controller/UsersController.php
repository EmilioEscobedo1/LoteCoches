<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);
        // Allow unauthenticated users to access login and add actions
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function login()
{
    $this->request->allowMethod(['get', 'post']);
    $this->viewBuilder()->setLayout('login');

    $result = $this->Authentication->getResult();

    if ($result->isValid()) {
        // Redirige al dashboard admin
        $redirect = $this->request->getQuery('redirect', [
            'prefix' => 'Admin',
            'controller' => 'Dashboard',
            'action' => 'index'
        ]);
        return $this->redirect($redirect);
    }

    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Usuario o contraseña inválidos'));
    }
}

public function add()
{
    $user = $this->Users->newEmptyEntity();
    if ($this->request->is('post')) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        // Asignar admin por default si quieres
        if (!isset($user->admin)) {
            $user->admin = 1;
        }
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Usuario registrado correctamente'));
            return $this->redirect(['action' => 'login']);
        }
        $this->Flash->error(__('No se pudo registrar el usuario, revisa los campos'));
    }
    $this->set(compact('user'));
}

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}