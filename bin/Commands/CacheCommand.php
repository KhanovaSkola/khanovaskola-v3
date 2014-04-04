<?php

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CacheCommand extends Command
{

    protected $dir;

    public function setup()
    {
        parent::setup();
        $this->dir = "$this->root/temp/cache";
    }

    protected function actionCreate()
    {
        @mkdir($this->dir, 0777, TRUE);
    }

    protected function actionPurge(InputInterface $input, OutputInterface $output)
    {
        $it = new RecursiveDirectoryIterator($this->dir);
        $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file)
        {
            if ($file->getFilename() === '.' || $file->getFilename() === '..')
            {
                continue;
            }

            $path = $file->getRealPath();
            if ($file->isDir())
            {
                $success = rmdir($path);
            }
            else
            {
                $success = unlink($path);
            }

            $short = substr($path, strLen(realpath($path)) + 1);
            if ($success)
            {
                // $output->writeLn("- $short");
            }
            else
            {
                $output->writeLn("<error>! $short (not removed)</error>");
            }
        }
    }
}
