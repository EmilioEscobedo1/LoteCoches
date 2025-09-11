<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Log\Log;

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
        // Permitir login y logout sin autenticación
        $this->Authentication->allowUnauthenticated(['login', 'logout', 'add']);
    }

    public function login()
    {
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    if ($result->isValid()) {
        $redirect = $this->request->getQuery('redirect', ['prefix' => 'Admin', 'controller' => 'Dashboard', 'action' => 'index']);
        return $this->redirect($redirect);
    }
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Usuario o contraseña inválidos'));
    }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    // Listar usuarios
    public function index()
    {
        $this->paginate = ['limit' => 20];
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    // Agregar usuario
    public function add()
    {
        // Crear nueva entidad vacía
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            // Parchar la entidad con los datos del formulario
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->admin = 1;
            // Intentar guardar
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario creado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                // Guardar errores de validación en logs
                $errors = $user->getErrors();
                Log::debug('Errores al crear usuario: ' . json_encode($errors));
                $this->Flash->error(__('No se pudo crear el usuario. Revisa los logs para más detalles.'));
            }
        }

        // Pasar la entidad al template
        $this->set(compact('user'));
    }

    // Editar usuario
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if (!empty($data['password'])) {
                $data['password'] = (new DefaultPasswordHasher())->hash($data['password']);
            } else {
                unset($data['password']); // no sobreescribir si está vacío
            }
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el usuario. Intenta de nuevo.'));
        }
        $this->set(compact('user'));
    }

    // Eliminar usuario
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el usuario. Intenta de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}