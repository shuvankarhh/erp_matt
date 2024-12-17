<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Organization;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'crm_contacts';
    protected $guarded = [];

    protected $attributes = [
        'acting_status' => 1
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['organization'] ?? false, function($query) use ($filters) {
            $organization_id = $filters['organization'];
            $organization_id = Organization::decrypted_id($organization_id);
            $query->where('organization_id', $organization_id);
        });
    }

    public function source()
    {
        return  $this->belongsTo(ContactSource::class, 'source_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'crm_contact_tags', 'contact_id', 'tag_id');
    }

    public function owner()
    {
        return $this->belongsTo(Staff::class, 'owner_id');
    }

    public function address()
    {
        return  $this->belongsTo(ContactAddress::class, 'primary_address_id');
    }

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }

    // Cascading deletion for tags and contact addresses
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($contact) {
            // PermanentDelete associated tags
            $contact->tags()->detach();

            // // Soft delete associated tags
            // $contact->tags()->delete();

            // SoftDelete associated contact addresses
            $contact->address()->delete();
        });
    }
}
