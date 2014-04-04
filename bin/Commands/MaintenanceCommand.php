<?php

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MaintenanceCommand extends Command
{
    protected $dir;

    public function setup()
    {
        parent::setup();
        $this->dir = "$this->root/www";
    }

    protected function actionStart(InputInterface $input, OutputInterface $output)
    {
        if (!file_exists("$this->dir/_maintenance.php")
         || !file_exists("$this->dir/index.php")
        ) {
            $output->writeLn('<error>Not in state to start maintenance mode, skipping</error>');
            return;
        }
        if (file_exists("$this->dir/_index.php"))
        {
            unlink("$this->dir/_index.php");
        }
        rename("$this->dir/index.php", "$this->dir/_index.php");
        rename("$this->dir/_maintenance.php", "$this->dir/index.php");
    }

    protected function actionStop(InputInterface $input, OutputInterface $output)
    {
        if (!file_exists("$this->dir/index.php")
         || !file_exists("$this->dir/_index.php")
        ) {
            $output->writeLn('<error>Not in state to stop maintenance mode, skipping</error>');
            return;
        }
        if (file_exists("$this->dir/_maintenance.php"))
        {
            unlink("$this->dir/_maintenance.php");
        }
        rename("$this->dir/index.php", "$this->dir/_maintenance.php");
        rename("$this->dir/_index.php", "$this->dir/index.php");
    }
}
