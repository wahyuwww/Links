<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $linked =  new \App\User;
        $linked->username = "wahyu";
        $linked->nip = "121212";
        $linked->email = "wahyu@gmail.com";
        $linked->password = \Hash::make("wahyu");
        $linked->save();
        $this->command->info("user Admin Berhasil Dibuat");
    }
}
