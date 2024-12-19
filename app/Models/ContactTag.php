<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactTag extends Model
{
    use HasFactory;

    protected $table = 'crm_contact_tags';

    protected $fillable = [
        'tenant_id',
        'contact_id',
        'tag_id'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
