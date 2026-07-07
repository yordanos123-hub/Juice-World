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
        // 1. ተጠቃሚዎች
        $admin = \App\Models\User::create(['name' => 'Admin', 'email' => 'admin@juice.com', 'password' => bcrypt('password123'), 'is_admin' => true]);

        // 2. ቅርንጫፎች
        // 1. የእሸት ቅርንጫፍ
        $eshet = Branch::create([
            'name' => 'Eshet Branch',
            'location' => 'እሸት',
            'phone' => '09-11-04-00-55'
        ]);

// 2. የመስቀለኛ ቅርንጫፍ
        $meskel = Branch::create([
            'name' => 'Meskelegna Branch',
            'location' => 'መስቀለኛ',
            'phone' => '09-22-22-22-22'
        ]);
        // 3. የጁስ ዝርዝር (16 አይነቶች)
        $juiceData = [
            ['name'=>'Avocado','category'=>'Juice','price'=>150], ['name'=>'Papaya','category'=>'Juice','price'=>150],
            ['name'=>'Spris','category'=>'Juice','price'=>150], ['name'=>'Ambasha','category'=>'Juice','price'=>150],
            ['name'=>'Zaytun','category'=>'Juice','price'=>150], ['name'=>'Strawberry','category'=>'Juice','price'=>180],
            ['name'=>'Mango','category'=>'Juice','price'=>200], ['name'=>'Spris with Mango','category'=>'Juice','price'=>170],
            ['name'=>'Pineapple','category'=>'Juice','price'=>180], ['name'=>'Watermelon','category'=>'Juice','price'=>160],
            ['name'=>'Apple','category'=>'Juice','price'=>240], ['name'=>'Orange','category'=>'Juice','price'=>180],
            ['name'=>'Lemon','category'=>'Juice','price'=>150], ['name'=>'Juice World Special','category'=>'Juice','price'=>220],
            ['name'=>'Fruit Punch Big','category'=>'Juice','price'=>230], ['name'=>'Fruit Punch Small','category'=>'Juice','price'=>180],
        ];

        // 4. የሚልክሼክ ዝርዝር (11 አይነቶች)
        $shakeData = [
            ['name'=>'Avocado Shake','category'=>'Milkshake','price'=>200], ['name'=>'Papaya Shake','category'=>'Milkshake','price'=>200],
            ['name'=>'Zaytun Shake','category'=>'Milkshake','price'=>200], ['name'=>'Ambasha Shake','category'=>'Milkshake','price'=>200],
            ['name'=>'Watermelon Shake','category'=>'Milkshake','price'=>210], ['name'=>'Banana Shake','category'=>'Milkshake','price'=>200],
            ['name'=>'Mango Shake','category'=>'Milkshake','price'=>250], ['name'=>'Chocolate Shake','category'=>'Milkshake','price'=>220],
            ['name'=>'Date Shake','category'=>'Milkshake','price'=>250], ['name'=>'Strawberry Shake','category'=>'Milkshake','price'=>250],
            ['name'=>'Vanilla Shake','category'=>'Milkshake','price'=>200],
        ];

        // ዳታቤዝ ውስጥ አስገባቸው እና ከቅርንጫፍ ጋር አያይዛቸው
        foreach (array_merge($juiceData, $shakeData) as $item) {
            $juice = \App\Models\Juice::create($item);
            // ሁለቱም ቅርንጫፎች ላይ እንዲኖሩ አድርገናቸዋል
            $eshet->juices()->attach($juice->id);
            $meskel->juices()->attach($juice->id);
        }
    }
}
