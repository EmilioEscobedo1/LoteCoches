<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class User extends Entity
{

    protected array $_accessible = [
        '*' => true,
        'id' => false,
        'username' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
    ];

    protected function _setPassword(?string $password): ?string
    {
        if ($password) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return null;
    }
    protected array $_hidden = [
        'password',
    ];
}