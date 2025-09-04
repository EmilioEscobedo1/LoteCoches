<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');

        $this->viewBuilder()->setLayout('public');

        if ($this->request->getParam('prefix') === 'Admin') {            
            $this->viewBuilder()->setLayout('admin');
        }

    }
}