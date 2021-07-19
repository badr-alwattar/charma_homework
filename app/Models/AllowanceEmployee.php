<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AllowanceEmployee extends Pivot
{
    protected $table = 'allowance_type_employee';
}
