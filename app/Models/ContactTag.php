<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactTag extends Model
{
    use HasFactory;
    protected $table = 'crm_contact_tags';

    protected $fillable = ['contact_id', 'tag_id'];
}
