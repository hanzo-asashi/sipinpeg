<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class InstansiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_instansi' => 'INS-00001',
            'nama_instansi' => 'DINAS KESEHATAN',
            'short_name' => 'DINKES',
            'npwp_instansi' => '54.234.454.634-234',
        ];
    }
}
