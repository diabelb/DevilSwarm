<?php

declare(strict_types=1);

namespace DevilSwarm;

use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    const NAME = 'DevilSwarm';
    const VERSION = 'v0.01';

    public function __construct(iterable $commands)
    {
        parent::__construct(self::NAME, self::VERSION);

        foreach ($commands as $command) {
            $this->add($command);
        }
    }
}
