<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * The settings to add.
     */
    protected $settings = [
        [
            'key'         => 'contact_email',
            'name'        => 'Contact form email address',
            'description' => 'The email address that all emails from the contact form will go to.',
            'value'       => 'admin@shop.pe',
            'field'       => '{"name":"value","label":"Value","type":"email"}',
            'active'      => 1,
        ],
        [
            'key'         => 'title_site',
            'name'        => 'title site',
            'description' => 'Nombre del sitio web',
            'value'       => 'Plataforma de tiendas online',
            'field'       => '{"name":"value","label":"Value","type":"textarea"}',
            'active'      => 1,
        ],
        [
            'key'         => 'duracion_reserva',
            'name'        => 'duracion reserva',
            'description' => 'Duracion de la reserva',
            'value'       => '5',
            'field'       => '{"name":"value","label":"Value","type":"number","hint":"Duracion en minutos"}',
            'active'      => 1,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = DB::table('settings')->insert($setting);

            if (!$result) {
                $this->command->info("Insert failed at record $index.");

                return;
            }
        }

        $this->command->info('Inserted '.count($this->settings).' records.');
    }
}
