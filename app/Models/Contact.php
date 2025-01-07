<?php

namespace App\Models;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'crm_contacts';

    protected $guarded = [];

    protected $attributes = [
        'acting_status' => 1
    ];

    public function scopeFilter($query, $filters)
    {
        return $query
            ->when(!empty($filters['stage']), function ($query) use ($filters) {
                $query->whereIn('stage', (array) $filters['stage']);
            })
            ->when(!empty($filters['engagement']), function ($query) use ($filters) {
                $query->whereIn('engagement', (array) $filters['engagement']);
            })
            ->when(!empty($filters['lead_status']), function ($query) use ($filters) {
                $query->whereIn('lead_status', (array) $filters['lead_status']);
            })
            ->when(!empty($filters['source_id']), function ($query) use ($filters) {
                $query->whereIn('source_id', (array) $filters['source_id']);
            })
            ->when(!empty($filters['organization_id']), function ($query) use ($filters) {
                $query->whereIn('organization_id', (array) $filters['organization_id']);
            })
            ->when(!empty($filters['tags']), function ($query) use ($filters) {
                $query->whereHas('tags', function ($tagQuery) use ($filters) {
                    $tagQuery->whereIn('crm_tags.id', (array) $filters['tags']);
                });
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

    public function getNameEmailAttribute()
    {
        return $this->name . ' - ' . ($this->email ?? null);
    }

    public function customerAccount()
    {
        return $this->hasOne(CustomerAccount::class, 'contact_id', 'id');
    }
}
