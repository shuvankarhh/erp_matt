<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteSolution extends Model
{
    use HasFactory;

    protected $table = 'crm_quote_solutions';
    protected $fillable = ['quote_id', 'solution_id', 'quantity', 'discount_percentage'];

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }
}
