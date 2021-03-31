<?php


namespace DevilSwarm\BashCommand;


use DevilSwarm\BashCommand\Decorators\InstallCurl;
use DevilSwarm\BashCommand\Decorators\InstallDocker;
use DevilSwarm\BashCommand\Decorators\InstallNetTools;
use DevilSwarm\BashCommand\Decorators\SetHostName;
use DevilSwarm\BashCommand\Decorators\UpdatePackages;

class LocalBashCommandFactory implements BashCommandFactory
{
    private function getInitialCommand(): BashCommand
    {
        return new LocalCommand();
    }

    public function createInitNodeCommand(string $hostName): BashCommand
    {
        return
            new InstallDocker(
                new InstallNetTools(
                    new InstallCurl(
                        new SetHostName($hostName,
                            new UpdatePackages(
                                $this->getInitialCommand()
                            )
                        )
                    )
                )
        );
    }
}
