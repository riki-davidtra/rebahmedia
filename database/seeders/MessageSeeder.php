<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'name'    => 'John Doe',
                'email'   => 'john@example.com',
                'subject' => 'Pesan Percobaan',
                'body'    => 'Halo, ini adalah pesan percobaan',
            ],
            [
                'name'    => 'Jane Smith',
                'email'   => 'jane@example.com',
                'subject' => 'Pertanyaan Layanan',
                'body'    => 'Saya punya pertanyaan tentang layanan Anda.',
            ],
        ];

        foreach ($data as $item) {
            Message::updateOrCreate(
                ['name' => $item['name']],
                [
                    'name'    => $item['name'],
                    'email'   => $item['email'],
                    'subject' => $item['subject'],
                    'body'    => $item['body'],
                    'is_read' => false,
                ]
            );
        }
    }
}
