<?php

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogCommand extends Command
{

    protected $dir;

    public function setup()
    {
        parent::setup();
        $this->dir = "$this->root/log";
    }

    protected function actionCreate()
    {
        @mkdir($dir, 0777, TRUE);
    }

    protected function actionList(InputInterface $input, OutputInterface $output)
    {
        $sent = file_exists("$this->dir/email-sent");
        $dumps = glob("$this->dir/exception-*.html");
        foreach ($dumps as $file)
        {
            list($time, $problem, $description) = $this->parseDump($file);
            $output->writeLn(date('Y-m-d H:i', $time) . " <info>$problem</info>");
            $output->writeLn("                 $description");
        }
        if ($sent)
        {
            $output->writeLn("\n<info>Lock sent-file present</info>");
        }
    }

    private function parseDump($file)
    {
        $html = file_get_contents($file);
        $match = [];
        preg_match('~<title>(?P<problem>.*?)</title><!-- (?P<description>.*?) -->~ims', $html, $match);
        $rawTime = substr(basename($file), strlen('exception-'), strlen('2014-02-28-16-34-52'));
        $rawTime[10] = ' ';
        $rawTime[13] = ':';
        $rawTime[16] = ':';
        $time = strToTime($rawTime);
        return [$time, $match['problem'], trim($match['description'])];
    }

}
