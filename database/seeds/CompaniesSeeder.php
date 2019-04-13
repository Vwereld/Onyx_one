<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    const COMPANIES = [
        [
            'contractor' => 'Test'
        ],
        [
            'contractor' => 'Company_1'
        ],
        [
            'contractor' => 'Company_2'
        ],
        [
            'contractor' => 'Company_3'
        ],
        [
            'contractor' => 'Company_4'
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::COMPANIES as $companyData) {
            $company = new \App\Company();
            $company->contractor = $companyData['contractor'];
            $company->save();
        }
    }
}
