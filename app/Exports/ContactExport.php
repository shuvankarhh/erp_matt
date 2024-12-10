<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactExport implements FromCollection, WithHeadings, WithMapping
{
    protected $index = 0;

    public function collection()
    {
        // dd(Contact::get());
        return Contact::with('source', 'organization', 'owner', 'address')->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Job Title',
            'Email',
            'Phone',
            'Stage',
            'Engagement',
            'Lead Status',
            'Source',
            'Organization',
            'Owner',
            'Primary Address',
            // 'Billing Address',
            // 'Shipping Address',
            'Acting Status',
        ];
    }

    public function map($contact): array
    {
        $engagement = "";
        $stage = "";
        $leadStatus = "";
        $actingStatus = "";

        if ($contact->stage == 1) {
            $stage = "Subscriber";
        } elseif ($contact->stage == 2) {
            $stage = "Lead";
        } elseif ($contact->stage == 3) {
            $stage = "Opportunity";
        } elseif ($contact->stage == 4) {
            $stage = "Customer";
        } elseif ($contact->stage == 5) {
            $stage = "Evangelist";
        } elseif ($contact->stage == 5) {
            $stage = "Other";
        }

        if ($contact->engagement == 1) {
            $engagement = "Hot";
        } elseif ($contact->engagement == 2) {
            $engagement = "Warm";
        } elseif ($contact->engagement == 3) {
            $engagement = "Cold";
        }

        if ($contact->lead_status == 1) {
            $leadStatus = "New";
        } elseif ($contact->lead_status == 2) {
            $leadStatus = "Contacted";
        } elseif ($contact->lead_status == 3) {
            $leadStatus = "In Progress";
        } elseif ($contact->lead_status == 4) {
            $leadStatus = "Qualified";
        } elseif ($contact->lead_status == 5) {
            $leadStatus = "Unqualified";
        } elseif ($contact->lead_status == 6) {
            $leadStatus = "Attempted To Contact";
        }

        if ($contact->acting_status == 1) {
            $actingStatus = "Active";
        } elseif ($contact->acting_status == 2) {
            $actingStatus = "Archived";
        }

        return [
            ++$this->index,
            $contact->name,
            $contact->job_title,
            $contact->email,
            $contact->phone_code . $contact->phone,
            $stage,
            $engagement,
            $leadStatus,
            $contact->source ? $contact->source->name : '-',
            $contact->organization ? $contact->organization->name : '-',
            $contact->owner ? $contact->owner->name : '-',
            $contact->address ? $contact->address->title : '-',
            // $contact->billing_address_id,
            // $contact->shipping_address_id,
            $actingStatus,
        ];
    }
}
