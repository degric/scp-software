<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DevicesTableSeeder extends Seeder
{
   
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('devices')->insert([
                'ip' => '192.168.1.' . rand(2, 254),
                'mac' => Str::random(2) . ':' . Str::random(2) . ':' . Str::random(2) . ':' . Str::random(2) . ':' . Str::random(2) . ':' . Str::random(2),
                'fecha_conexion' => now(),
                'fin_conexion' => now()->addHours(rand(1, 24)),
                'network_id' => rand(1, 5),
                'sistema_operativo' => 'Linux',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
