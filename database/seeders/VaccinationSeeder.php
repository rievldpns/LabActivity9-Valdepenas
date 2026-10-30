<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'patient_name' => 'Patricia Marie D. Valdepenas',
                'purok' => 'Purok 34',
                'vaccine' => 'BCG',
                'dose' => '1st dose',
                'scheduled_at' => '2026-03-12',
                'status' => 'Done'
            ],
            [
                'patient_name' => 'Gilianne Muriel A. Digma',
                'purok' => 'Purok 34',
                'vaccine' => 'Pentavalent',
                'dose' => '1st dose',
                'scheduled_at' => '2026-05-10',
                'status' => 'Scheduled'
            ],
            [
                'patient_name' => 'Johann Vincent D. Miro',
                'purok' => 'Purok 34',
                'vaccine' => 'OPV',
                'dose' => '2nd dose',
                'scheduled_at' => '2026-06-15',
                'status' => 'Scheduled'
            ],
            [
                'patient_name' => 'Martha Moreese M. Digma',
                'purok' => 'Purok 4',
                'vaccine' => 'MMR',
                'dose' => '1st dose',
                'scheduled_at' => '2026-08-20',
                'status' => 'Overdue'
            ],
            [
                'patient_name' => 'Haidee Daphne M. Digma',
                'purok' => 'Purok 34',
                'vaccine' => 'Anti-Flu',
                'dose' => 'Annual',
                'scheduled_at' => '2026-10-20',
                'status' => 'Overdue'
            ],
            [
                'patient_name' => 'Sarah Marie D. Vakdepenas',
                'purok' => 'Purok 34',
                'vaccine' => 'Varicella',
                'dose' => 'Booster',
                'scheduled_at' => '2026-05-09',
                'status' => 'Done'
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}