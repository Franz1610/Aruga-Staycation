<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing rooms
        \App\Models\Room::truncate();

        // Seed 8 Couple Rooms
        for ($i = 1; $i <= 8; $i++) {
            \App\Models\Room::create([
                'name' => "Couple Room $i",
                'type' => 'Couple Room',
                'price' => 2500.00,
                'status' => 'available',
                'description' => 'A cozy retreat designed for couples, featuring a king-size bed, warm ambient lighting, and modern amenities.',
                'image_url' => 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80',
                'amenities' => ['King Bed', 'High-speed WiFi', 'Flat-screen TV', 'Air Conditioning', 'Private Bathroom', 'Mini Fridge'],
            ]);
        }

        // Seed 2 Family Rooms
        for ($i = 1; $i <= 2; $i++) {
            \App\Models\Room::create([
                'name' => "Family Room $i",
                'type' => 'Family Room',
                'price' => 4500.00,
                'status' => 'available',
                'description' => 'Spacious and elegant accommodation for families, featuring two queen-size beds, a lounge area, and garden views.',
                'image_url' => 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=800&q=80',
                'amenities' => ['2 Queen Beds', 'High-speed WiFi', 'Smart TV', 'Air Conditioning', 'Refrigerator', 'Hot Shower', 'Balcony'],
            ]);
        }

        // Seed 1 Function Hall
        \App\Models\Room::create([
            'name' => 'Function Hall',
            'type' => 'Function Hall',
            'price' => 5000.00,
            'status' => 'available',
            'description' => 'A grand and versatile event venue perfect for conferences, weddings, celebrations, or workshops. Customizable seating layout.',
            'image_url' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=800&q=80',
            'amenities' => ['Premium Sound System', 'HD Projector & Screen', 'High-speed WiFi', 'Air Conditioning', 'Dedicated Restrooms', 'Custom Seating Layout'],
        ]);
    }
}
