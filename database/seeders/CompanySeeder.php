<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $owner = User::where('role', 'company-owner')->first();

        $companies = [
            ['name' => 'Digital Innovate Labs', 'address' => '456 Innovation Avenue, New York, NY 10001', 'industry' => 'Technology', 'website' => 'https://digitalinnovatelabs.com'],
            ['name' => 'CloudTech Systems', 'address' => '789 Cloud Boulevard, Seattle, WA 98101', 'industry' => 'Technology', 'website' => 'https://cloudtechsystems.com'],
            ['name' => 'WebStack Technologies', 'address' => '321 Web Lane, Austin, TX 78701', 'industry' => 'Technology', 'website' => 'https://webstacktech.com'],
            ['name' => 'Agile Software Corp', 'address' => '654 Agile Road, Boston, MA 02108', 'industry' => 'Technology', 'website' => 'https://agilesoftwarecorp.com'],
            ['name' => 'TechCore Solutions', 'address' => '123 Tech Street, San Francisco, CA 94105', 'industry' => 'Technology', 'website' => 'https://techcoresolutions.com'],
        ];

        foreach ($companies as $company) {
            Company::create(array_merge($company, ['user_id' => $owner->id]));
        }
    }
}