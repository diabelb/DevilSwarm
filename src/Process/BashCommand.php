<?php


namespace DevilSwarm\Process;

interface BashCommand
{
    public function execute();
    public function getProcessFactory(): ProcessFactory;
}
