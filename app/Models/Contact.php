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

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['organization'] ?? false, function ($query) use ($filters) {
    //         $organization_id = $filters['organization'];
    //         $organization_id = Organization::decrypted_id($organization_id);
    //         $query->where('organization_id', $organization_id);
    //     });
    // }

    public function scopeFilter($query, $filters)
    {
        return $query->when($filters['stage'] ?? false, function ($query, $stage) {
            $query->where('stage', $stage);
        })
            ->when($filters['engagement'] ?? false, function ($query, $engagement) {
                $query->where('engagement', $engagement);
            })
            ->when($filters['lead_status'] ?? false, function ($query, $lead_status) {
                $query->where('lead_status', $lead_status);
            })
            ->when($filters['source_id'] ?? false, function ($query, $source_id) {
                $query->where('source_id', $source_id);
            })
            ->when($filters['organization_id'] ?? false, function ($query, $organization_id) {
                $query->where('organization_id', $organization_id);
            })
            ->when($filters['tags'] ?? false, function ($query, $tags) {
                $query->whereIn('id', function ($query) use ($tags) {
                    $query->select('id')
                        ->from('crm_tags')
                        ->whereIn('id', $tags)
                        ->where('type', 1)
                        ->whereNull('deleted_at');
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
