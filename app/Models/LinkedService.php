<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinkedService extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'linked_services';

    public function linkedServiceSubType()
    {
        return  $this->belongsTo(LinkedServiceSubType::class, 'subtype');
    }

    public function linkedServiceType()
    {
        return  $this->belongsTo(LinkedServiceType::class, 'type');
    }


}
