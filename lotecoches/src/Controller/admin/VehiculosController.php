<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Laminas\Diactoros\UploadedFile;

class VehiculosController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
    }

    public function index()
    {
        $query = $this->Vehiculos->find()
            ->contain(['Categorias', 'Sucursals']);
        $vehiculos = $this->paginate($query);
        $this->set(compact('vehiculos'));
    }

    public function view($id = null)
    {
        $vehiculo = $this->Vehiculos->get($id, contain: ['Categorias', 'Sucursals']);
        $this->set(compact('vehiculo'));
    }

    public function add()
    {
        $vehiculo = $this->Vehiculos->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Procesar imagen
            $archivo = $this->request->getData('imagen');
            if ($archivo instanceof UploadedFile && $archivo->getError() === UPLOAD_ERR_OK) {
                $nombreArchivo = time() . '_' . $archivo->getClientFilename();
                $rutaDestino = WWW_ROOT . 'uploads' . DS . $nombreArchivo;
                $archivo->moveTo($rutaDestino);
                $data['imagen'] = $nombreArchivo;
            } else {
                $data['imagen'] = null;
            }

            $vehiculo = $this->Vehiculos->patchEntity($vehiculo, $data);

            if ($this->Vehiculos->save($vehiculo)) {
                $this->Flash->success(__('El vehículo ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el vehículo. Intenta de nuevo.'));
        }

        $categorias = $this->Vehiculos->Categorias->find('list')->all();
        $sucursals = $this->Vehiculos->Sucursals->find('list')->all();
        $this->set(compact('vehiculo', 'categorias', 'sucursals'));
    }

    public function edit($id = null)
    {
        $vehiculo = $this->Vehiculos->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Procesar imagen
            $archivo = $this->request->getData('imagen');
            if ($archivo instanceof UploadedFile && $archivo->getError() === UPLOAD_ERR_OK) {
                $nombreArchivo = time() . '_' . $archivo->getClientFilename();
                $rutaDestino = WWW_ROOT . 'uploads' . DS . $nombreArchivo;
                $archivo->moveTo($rutaDestino);
                $data['imagen'] = $nombreArchivo;
            } else {
                unset($data['imagen']); // Mantener imagen existente
            }

            $vehiculo = $this->Vehiculos->patchEntity($vehiculo, $data);

            if ($this->Vehiculos->save($vehiculo)) {
                $this->Flash->success(__('El vehículo ha sido actualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el vehículo. Intenta de nuevo.'));
        }

        $categorias = $this->Vehiculos->Categorias->find('list')->all();
        $sucursals = $this->Vehiculos->Sucursals->find('list')->all();
        $this->set(compact('vehiculo', 'categorias', 'sucursals'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiculo = $this->Vehiculos->get($id);
        if ($this->Vehiculos->delete($vehiculo)) {
            $this->Flash->success(__('El vehículo ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el vehículo. Intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
