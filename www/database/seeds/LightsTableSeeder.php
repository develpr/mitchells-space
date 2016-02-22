<?php

use Illuminate\Database\Seeder;

class LightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lights')->insert([
            'name' => "Hue Light 1",
            'maker_event' => "toggle_light_1",
            'position_x' => 50,
            'position_y' => 1,
        ]);
        DB::table('lights')->insert([
            'name' => "Hue Light 2",
            'maker_event' => "toggle_light_2",
            'position_x' => 1,
            'position_y' => 2,
        ]);

        DB::table('lights')->insert([
            'name' => "Hue Light 3",
            'maker_event' => "toggle_light_3",
            'position_x' => 45,
            'position_y' => 15,
        ]);

        DB::table('lights')->insert([
            'name' => "Hue Light 4",
            'maker_event' => "toggle_light_4",
            'position_x' => 5,
            'position_y' => 12,
        ]);

        DB::table('lights')->insert([
            'name' => "Hue Light 5",
            'maker_event' => "toggle_light_5",
            'position_x' => 26,
            'position_y' => -10,
        ]);

        DB::table('lights')->insert([
            'name' => "WeMo Insight Switch 1",
            'maker_event' => "toggle_wemo_1",
            'position_x' => 69,
            'position_y' => 7,
        ]);

        DB::table('lights')->insert([
            'name' => "WeMo Insight Switch 2",
            'maker_event' => "toggle_wemo_2",
            'position_x' => 13,
            'position_y' => 4,
        ]);

        DB::table('lights')->insert([
            'name' => "WeMo Switch 1",
            'maker_event' => "toggle_wemo_3",
            'position_x' => 90,
            'position_y' => 30,
        ]);
    }
}
