<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomFormData extends Model
{
    use HasFactory;
    protected $table = 'crm_custom_form_data';
    
    protected $fillable = [
        'form_id',
        'question',
        'question_name',
        'answer',
        'unique_number',
    ];
}
