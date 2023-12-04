<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\DB; 
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueProductExcept implements ValidationRule
{
    protected $table;
    protected $column;
    protected $exceptId;

    public function __construct($table, $column, $exceptId)
    {
        $this->table = $table;
        $this->column = $column;
        $this->exceptId = $exceptId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = DB::table($this->table)
            ->where($this->column, $value)
            ->where('id', '!=', $this->exceptId)
            ->count();

        if ($count !== 0) {
            $fail("The {$attribute} is not unique except for the current record.");
        }
    }
}
