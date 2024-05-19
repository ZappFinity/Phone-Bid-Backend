<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accessories = [
            [
                'name' => 'Watch 9 Max Smart Watch',
                'price' => '2400',
                'description' => 'Watch 9 Max Smart Watch is a smartwatch that has a 1.78-inch display. It has a 1.78-inch display with a resolution of 368x448 pixels. Watch 9 Max Smart Watch is powered by an one-core processor. The Watch 9 Max Smart Watch runs proprietary operating system and is powered by a 570mAh battery.',
                'image' => 'https://images.priceoye.pk/watch-9-max-smart-watch-pakistan-priceoye-2hu2w-500x500.webp',
                'type' => 'Watch',
                'brand' => 'Max',
            ],
            [
                'name' => 'Mibro A2 Bluetooth Calling Smart Watch',
                'price' => '7799',
                'description' => 'Mibro A2 Bluetooth Calling Smart Watch is a smartwatch that has a 1.69-inch display. It has a 1.69-inch display with a resolution of 240x280 pixels. Mibro A2 Bluetooth Calling Smart Watch is powered by an one-core processor. The Mibro A2 Bluetooth Calling Smart Watch runs proprietary operating system and is powered by a 220mAh battery.',
                'image' => 'https://images.priceoye.pk/mibro-a2-bluetooth-calling-smart-watch-pakistan-priceoye-vt9k7-500x500.webp',
                'type' => 'Watch',
                'brand' => 'Mibro',
            ],
            [
                'name' => 'M10 TWS Wireless Bluetooth Earbuds',
                'price' => '999',
                'description' => 'The M10 TWS Earbuds have a smooth Bluetooth connection, enabling you to link to your gadgets with ease for a trouble-free music experience. Wireless independence without the hassle of tangled cords. ',
                'image' => 'https://images.priceoye.pk/m10-tws-wireless-bluetooth-earbuds-pakistan-priceoye-c02r7-500x500.webp',
                'type' => 'Earbuds',
                'brand' => 'TWS',
            ],
            [
                'name' => 'Mi Power Bank 3 (20000mAh)',
                'price' => '6100',
                'description' => 'The Mi Power Bank 3 (20000mAh) is a high-capacity power bank that can charge your devices multiple times. It has a 20000mAh battery capacity and supports 18W fast charging. The power bank has two USB-A ports and one USB-C port for charging multiple devices simultaneously.',
                'image' => 'https://images.priceoye.pk/mi-power-bank-3-20000mah-pakistan-priceoye-daryg-500x500.webp',
                'type' => 'Power Bank',
                'brand' => 'Mi',
            ],
        ];

        foreach ($accessories as $accessory) {
            \App\Models\Accessory::create($accessory);
        }
    }
}
