<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            ['name' => 'زركونيا', 'quantity' => 50, 'min_quantity' => 10, 'price' => 150.00, 'unit' => 'قرص'],
            ['name' => 'طقم أسنان', 'quantity' => 30, 'min_quantity' => 5, 'price' => 200.00, 'unit' => 'طقم'],
            ['name' => 'تقويم شفاف', 'quantity' => 100, 'min_quantity' => 20, 'price' => 80.00, 'unit' => 'مجموعة'],
            ['name' => 'إيماكس', 'quantity' => 5, 'min_quantity' => 10, 'price' => 120.00, 'unit' => 'قرص'],
            ['name' => 'معدن', 'quantity' => 40, 'min_quantity' => 15, 'price' => 90.00, 'unit' => 'قرص'],
            ['name' => 'واقي ليلي', 'quantity' => 60, 'min_quantity' => 20, 'price' => 50.00, 'unit' => 'قطعة'],
            ['name' => 'أسمنت لاصق', 'quantity' => 200, 'min_quantity' => 50, 'price' => 25.00, 'unit' => 'عبوة'],
        ];

        foreach ($materials as $material) {
            Material::create($material);
        }
    }
}
