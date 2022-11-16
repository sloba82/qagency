<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AuthorServices;

class AddAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:Author';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(AuthorServices $authorServices)
    {
        $first_name = $this->ask('Author first name?');
        $last_name = $this->ask('Author last name?');
        $birthday = $this->ask('Author birthday?');
        $biography = $this->ask('Author biography?');
        $gender = $this->ask('Author gender?');
        $place_of_birth = $this->ask('Author place of birth?');

        $authorServices->createAuthor([
            'first_name' =>  $first_name,
            'last_name' =>  $last_name,
            'birthday' =>  $birthday,
            'biography' =>  $biography,
            'gender' =>  $gender,
            'place_of_birth' =>  $place_of_birth
        ]);

        return Command::SUCCESS;
    }
}
