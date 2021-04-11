<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    public const ADMIN = 1;
    public const CUSTOMER = 2;
}
