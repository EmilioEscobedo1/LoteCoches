<?php
namespace App\Controller\Admin;

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
        // Permitir login y logout sin autenticación
        $this->Authentication->allowUnauthenticated(['login', 'logout']);
    }

    public function login()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/dashboard';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Usuario o contraseña inválidos'));
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect('./');
    }

    // Listar usuarios
    public function index()
    {
        $this->paginate = [
            'limit' => 20
        ];
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    // Agregar usuario
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Patch entity con datos del formulario
            $user = $this->Users->patchEntity($user, $data);

            // Depuración en caso de error
            if ($user->getErrors()) {
                $this->Flash->error(__('Hay errores en el formulario. Revisa los datos.'));
            } else {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El usuario ha sido creado correctamente.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('No se pudo guardar el usuario. Intenta de nuevo.'));
                }
            }
        }
        $this->set(compact('user'));
    }

    // Editar usuario
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Evitar sobreescribir la contraseña si el campo está vacío
            if (empty($data['password'])) {
                unset($data['password']);
            }

            $user = $this->Users->patchEntity($user, $data);

            // Depuración en caso de error
            if ($user->getErrors()) {
                $this->Flash->error(__('Hay errores en el formulario. Revisa los datos.'));
            } else {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El usuario ha sido actualizado correctamente.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('No se pudo actualizar el usuario. Intenta de nuevo.'));
                }
            }
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

    public function view($id = null)
    {
        try {
            $user = $this->Users->get($id);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error(__('Usuario no encontrado.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('user'));
    }
}
