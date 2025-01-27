<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    public function contact()
    {
        return $this->hasOne(Contact::class, 'id', 'contact_id');
    }

    public function projectType()
    {
        return $this->hasOne(ProjectType::class, 'id', 'project_type_id');
    }

    public function insuranceInfo()
    {
        return $this->hasOne(InsuranceInfo::class, 'id', 'insurance_information_id');
    }

    public function referrerInfo()
    {
        return $this->hasOne(ReferrerInfo::class, 'id', 'referral_source_id');
    }

    public function serviceType()
    {
        return $this->hasOne(ServiceType::class, 'id', 'service_type_id');
    }

    public function makeSafe()
    {
        return $this->hasOne(MakeSafe::class, 'project_id', 'id');
    }

    public function internalMakeSafe()
    {
        return $this->hasOne(InternalMakeSafe::class, 'project_id');
    }

    public function externalMakeSafe()
    {
        return $this->hasOne(ExternalMakeSafe::class, 'project_id');
    }
}
