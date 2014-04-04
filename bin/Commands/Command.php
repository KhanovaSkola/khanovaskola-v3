<?php

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


abstract class Command extends BaseCommand
{

    protected $root;

    public function setup()
    {
        $this->root = __DIR__ . '/../../';
    }

    public function getName()
    {
        $name = str_replace('Command', '', get_class($this));
        return strToLower($name);
    }

    protected function getActions()
    {
        $ref = new ReflectionClass($this);
        $actions = [];
        $prefix = 'action';
        foreach ($ref->getMethods() as $method)
        {
            if (strpos($method->name, $prefix) === 0)
            {
                $name = substr($method->name, strlen($prefix));
                $actions[] = strToLower($name);
            }
        }
        return $actions;
    }

    protected function configure()
    {
        $allowed = implode('|', $this->getActions());
        $this
            ->setName($this->getName())
            ->addArgument(
                'action',
                InputArgument::REQUIRED,
                "[$allowed]"
            )
        ;
        $this->setup();
    }

    final protected function execute(InputInterface $input, OutputInterface $output)
    {
        $actions = $this->getActions();
        $action = $input->getArgument('action');

        if (!in_array($action, $actions))
        {
            throw new Exception; // TODO
        }

        $method = 'action' . ucFirst($action);
        $this->$method($input, $output);
    }

}
