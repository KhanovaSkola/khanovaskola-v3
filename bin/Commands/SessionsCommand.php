<?php

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SessionsCommand extends Command
{

    protected $dir;

    public function setup()
    {
        parent::setup();
        $this->dir = "$this->root/temp/sessions";
    }

    protected function actionCreate()
    {
        @mkdir($this->dir, 0777, TRUE);
    }

}
