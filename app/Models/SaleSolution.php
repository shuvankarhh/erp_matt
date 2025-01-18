<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleSolution extends Model
{
    use HasFactory;

    protected $table = 'crm_sale_solutions';

    protected $fillable = ['tenant_id', 'sale_id', 'solution_id', 'quantity', 'discount_percentage'];

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }
}
