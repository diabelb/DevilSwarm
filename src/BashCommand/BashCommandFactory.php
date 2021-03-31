<?php


namespace DevilSwarm\BashCommand;


interface BashCommandFactory
{
    public function createInitNodeCommand(string $hostName): BashCommand;
}
