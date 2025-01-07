<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplateSeeder extends Seeder
{
    public function run()
    {
        $templates = [
            [
                'name' => 'Welcome Email',
                'subject' => 'Welcome to [[Company_Name]] - HR Portal Access',
                'body' => '<p>Hi&nbsp;[[Employee_Name]],

                <p>Welcome to [[Company_Name]]! We’re thrilled to have you on board and can’t wait to see the contributions you’ll bring to the team.</p>

                <p>To help you get started, we’ve set up your access to our HR Portal. Below are your login details:</p>

                <p>Portal Link: [[Portal_Link]]</p><p>Username:&nbsp;[[Employee_Email]]</p><p>Temporary Password:&nbsp;[[Password]]</p>

                <br>

                <p>Steps to Get Started:</p>

                <p>Click the link above to log in to the portal.</p><p>Use the temporary password to access your account.</p>

                <p>If you have any questions or need assistance, feel free to reach out to the HR team at hr.emea@seattleav.com.</p>

                <p>Once again, welcome to the team! We’re excited to have you with us.</p>

                <br>

                <p>Best regards,</p><p>[[HR_Name]]</p><p>HR Team</p><p>[[Company_Name]]</p>'
            ],

            [
                'name' => 'Password Reset Email',
                'subject' => 'Reset Your Password',
                'body' => '<p>Hello&nbsp;[[Employee_Name]],</p><p>We received a request to reset the password for your HRMplus account. To proceed with resetting your password, please click the link below:</p><br><p>[[Password_Reset]]</p><br><p>If you did not request this password reset, please disregard this email.</p><br><p>Best regards,</p><p>[[Company_Name]]<br></p>'
            ]
        ];

        DB::table('crm_email_templates')->insert($templates);
    }
}
