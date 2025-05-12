<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\CartItem;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First remove any existing cart items
        CartItem::query()->delete();
        
        // Now we can safely delete all products
        Product::query()->delete();
        
        // Create products
        $products = [
            [
                'id' => 1,
                'name' => 'MAD Mr Bert\'s Souvenir',
                'description' => 'A premium 100% organic Tee-Shirt/ Hoodie, Sporty Cap and a handy Jute bag showcasing digitally embroidered proud colors of Whistler Sky Sports',
                'price' => 49.99,
                'image' => 'https://picsum.photos/400/300?random=1',
                'category' => 'apparel',
                'featured' => true,
                'badge' => 'Bestseller',
                'stock' => 50
            ],
            [
                'id' => 2,
                'name' => 'MAD Mr Bert\'s Flight Suit',
                'description' => 'Weather-resistant aviation jacket designed for maximum comfort during flight',
                'price' => 129.99,
                'image' => 'https://picsum.photos/400/300?random=2',
                'category' => 'apparel',
                'featured' => true,
                'badge' => 'New',
                'stock' => 25
            ],
            [
                'id' => 3,
                'name' => 'UPAC Log Book',
                'description' => 'Essential tools for flight planning and tracking your flying hours',
                'price' => 79.99,
                'image' => 'https://picsum.photos/400/300?random=3',
                'category' => 'equipment',
                'featured' => true,
                'badge' => 'Popular',
                'stock' => 100
            ],
            [
                'id' => 4,
                'name' => 'Aviation Headset',
                'description' => 'Premium noise-cancelling aviation headset with crystal clear communication',
                'price' => 249.99,
                'image' => 'https://picsum.photos/400/300?random=4',
                'category' => 'equipment',
                'featured' => false,
                'badge' => null,
                'stock' => 15
            ],
            [
                'id' => 5,
                'name' => 'Flight Training Manual',
                'description' => 'Comprehensive guide to ultralight aircraft piloting with detailed illustrations',
                'price' => 89.99,
                'image' => 'https://picsum.photos/400/300?random=5',
                'category' => 'training',
                'featured' => false,
                'badge' => null,
                'stock' => 75
            ],
            [
                'id' => 6,
                'name' => 'Aviation Sunglasses',
                'description' => 'UV-protected polarized sunglasses designed specifically for pilots',
                'price' => 119.99,
                'image' => 'https://picsum.photos/400/300?random=6',
                'category' => 'accessories',
                'featured' => false,
                'badge' => 'Limited Edition',
                'stock' => 30
            ]
        ];
        
        // Insert all products
        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 