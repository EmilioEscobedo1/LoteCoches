<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
    // Declaración correcta para CakePHP 5 con tipado
    protected array $_accessible = [
        '*' => true,
        'id' => false,
    ];

    // Hashear contraseña automáticamente
    protected function _setPassword(?string $password): ?string
    {
        if ($password) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return null;
    }
}