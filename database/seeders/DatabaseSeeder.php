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
        // 3. የጁስ ዝርዝር (ከነ ምስላቸው)
        $juiceData = [
            ['name'=>'Avocado','category'=>'Juice','price'=>150, 'image'=>'avocado.jpg'],
            ['name'=>'Papaya','category'=>'Juice','price'=>150, 'image'=>'papaya.jpg'],
            ['name'=>'Spris','amharic'=>'ስፕሪስ','category'=>'Juice','price'=>150, 'image'=>'spris.jpg'],
            ['name'=>'Ambasha','category'=>'Juice','price'=>150, 'image'=>'ambasha.jpg'],
            ['name'=>'Zaytun','category'=>'Juice','price'=>150, 'image'=>'zaytun.jpg'],
            ['name'=>'Strawberry','category'=>'Juice','price'=>180, 'image'=>'strawberry.jpg'],
            ['name'=>'Mango','category'=>'Juice','price'=>200, 'image'=>'mango.jpg'],
            ['name'=>'Spris with Mango','category'=>'Juice','price'=>170, 'image'=>'spris-mango.jpg'],
            ['name'=>'Pineapple','category'=>'Juice','price'=>180, 'image'=>'pineapple.jpg'],
            ['name'=>'Watermelon','category'=>'Juice','price'=>160, 'image'=>'watermelon.jpg'],
            ['name'=>'Apple','category'=>'Juice','price'=>240, 'image'=>'apple.jpg'],
            ['name'=>'Orange','category'=>'Juice','price'=>180, 'image'=>'orange.jpg'],
            ['name'=>'Lemon','category'=>'Juice','price'=>150, 'image'=>'lemon.jpg'],
            ['name'=>'Juice World Special','category'=>'Juice','price'=>220, 'image'=>'special.jpg'],
            ['name'=>'Fruit Punch Big','category'=>'Juice','price'=>230, 'image'=>'punch-big.jpg'],
            ['name'=>'Fruit Punch Small','category'=>'Juice','price'=>180, 'image'=>'punch-small.jpg'],
        ];

// 4. የሚልክሼክ ዝርዝር (ከነ ምስላቸው)
        $shakeData = [
            ['name'=>'Avocado Shake','category'=>'Milkshake','price'=>200, 'image'=>'AvocadoShake.jpg'],
            ['name'=>'Papaya Shake','category'=>'Milkshake','price'=>200, 'image'=>'PapayaShake.jpg'],
            ['name'=>'Zaytun Shake','category'=>'Milkshake','price'=>200, 'image'=>'ZaytunShake.jpg'],
            ['name'=>'Ambasha Shake','category'=>'Milkshake','price'=>200, 'image'=>'AmbashaShake.jpg'],
            ['name'=>'Watermelon Shake','category'=>'Milkshake','price'=>210, 'image'=>'WatermelonShake.jpg'],
            ['name'=>'Banana Shake','category'=>'Milkshake','price'=>200, 'image'=>'BananaShake.jpg'],
            ['name'=>'Mango Shake','category'=>'Milkshake','price'=>250, 'image'=>'MangoShake.jpg'],
            ['name'=>'Chocolate Shake','category'=>'Milkshake','price'=>220, 'image'=>'ChocolateShake.jpg'],
            ['name'=>'Date Shake','category'=>'Milkshake','price'=>250, 'image'=>'DateShake.jpg'],
            ['name'=>'Strawberry Shake','category'=>'Milkshake','price'=>250, 'image'=>'StrawberryShake.jpg'],
            ['name'=>'Vanilla Shake','category'=>'Milkshake','price'=>200, 'image'=>'VanillaShake.jpg'],
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
