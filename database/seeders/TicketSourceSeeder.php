<?php

namespace Database\Seeders;

use App\Models\TicketSource;
use Illuminate\Database\Seeder;

class TicketSourceSeeder extends Seeder
{
    public function run(): void
    {
        $ticket_sources = [
            'Email',
            'Phone',
            'Web Form',
            'Live Chat',
            'Facebook',
            'Twitter',
            'Walk-in',
            'WhatsApp',
            'SMS',
            'Mobile App',
            'API',
            'Marketplace',
            'Support Portal',
            'Community Forums',
            'Partner Portal',
            'Knowledge Base',
            'Third-Party Integration',
            'In-Product Feedback',
            'Event or Webinar',
            'Other'
        ];

        foreach ($ticket_sources as $ticket_source) {
            TicketSource::create([
                'tenant_id' => 1,
                'name' => $ticket_source
            ]);
        }
    }
}
