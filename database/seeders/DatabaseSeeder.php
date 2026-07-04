<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Juice;
use App\Models\User; // የተጠቃሚ ሞዴል (User Model) እዚህ ጋር ተጨምሯል
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. ለአድሚኑ አካውንት መፍጠር (is_admin => true ነው)
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@juice.com',
            'password' => bcrypt('password123'),
            'is_admin' => true,
        ]);

        // 2. ለተራ ዩዘር አካውንት መፍጠር (is_admin => false ነው)
        User::create([
            'name' => 'Normal Customer',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'is_admin' => false,
        ]);

        // 3. ቅርንጫፎችን መፍጠር (የድሮ ኮድህ)
        $eshet = Branch::create([
            'name' => 'Eshet Branch',
            'location' => 'Eshet',
            'phone' => '0911-111111'
        ]);
        $meskel = Branch::create([
            'name' => 'Meskelegna Branch',
            'location' => 'Meskelegna',
            'phone' => '0922-222222'
        ]);

        // 4. ጁሶችን መፍጠር (የድሮ ኮድህ)
        $avocado = Juice::create([
            'name' => 'Avocado Juice',
            'description' => 'Fresh avocado with milk',
            'price' => 120
        ]);
        $mango = Juice::create([
            'name' => 'Mango Juice',
            'description' => 'Sweet organic mango',
            'price' => 100
        ]);
        $papaya = Juice::create([
            'name' => 'Papaya Juice',
            'description' => 'Fresh papaya juice',
            'price' => 90
        ]);

        // 5. ጁሶችን ከቅርንጫፎች ጋር ማገናኘት (የድሮ ኮድህ)
        $eshet->juices()->attach([$avocado->id, $mango->id, $papaya->id]);
        $meskel->juices()->attach([$avocado->id, $mango->id]);
    }
}
