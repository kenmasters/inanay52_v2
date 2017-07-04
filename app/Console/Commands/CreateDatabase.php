<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use PDO;
use PDOException;

use App\User;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $DB_CONNECTION = env('DB_CONNECTION');
        $DB_HOST = env('DB_HOST');
        $DB_PORT = env('DB_PORT');
        $DB_DATABASE = env('DB_DATABASE', false);
        $DB_USERNAME = env('DB_USERNAME');
        $DB_PASSWORD = env('DB_PASSWORD');

        if (! $DB_DATABASE) {
            $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
            return;
        }

         $this->comment(PHP_EOL.
            "DB_CONNECTION: $DB_CONNECTION".PHP_EOL.
            "DB_HOST: $DB_HOST".PHP_EOL.
            "DB_PORT: $DB_PORT".PHP_EOL.
            "DB_DATABASE: $DB_DATABASE".PHP_EOL.
            "DB_USERNAME: $DB_USERNAME".PHP_EOL.
            "DB_PASSWORD: $DB_PASSWORD"
        ); 

        if ($this->confirm('Is this your .env configuration ? [Y|N]')) {

            try {
                $pdo = $this->getPDOConnection($DB_HOST, $DB_PORT, $DB_USERNAME, $DB_PASSWORD);
                
                $pdo->exec(sprintf(
                    'CREATE DATABASE IF NOT EXISTS %s;',
                    $DB_DATABASE
                ));

                $this->info(sprintf('Successfully created %s database', $DB_DATABASE));
            } catch (PDOException $exception) {
                $this->error(sprintf('Failed to create %s database, %s', $DB_DATABASE, $exception->getMessage()));
            }

        }

    }

      /**
     * @param  string $host
     * @param  integer $port
     * @param  string $username
     * @param  string $password
     * @return PDO
     */
    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }

}
