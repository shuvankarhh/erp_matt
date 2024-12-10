<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceSolution extends Model
{
    use HasFactory;

    protected $table = 'crm_invoice_solutions';
    protected $fillable = ['invoice_id', 'solution_id', 'quantity', 'discount_percentage'];

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }
}
