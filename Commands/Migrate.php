<?php
namespace App\Commands;

use App\Core\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Migrate extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $discription = "Migrate database";
    
    /**
     * Command configuration method
     *
     * @return void
     */
    protected function configure()
    {
        // parent::configure();
        $this->setName($this->name)->setDescription($this->discription);
    }

    /**
     * Execute command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int integer 0 on success, or an error code
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        require_once __DIR__.'/../vendor/autoload.php';
        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $config = [
            'db' => [
                'dsn' => $_ENV['DB_DSN'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],
            ]
        ];

        $app = new Application(dirname(__DIR__), $config);

        $app->database->applyMigration();

        return 0;
    }
}