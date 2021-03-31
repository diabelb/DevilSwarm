<?php


namespace DevilSwarm\Command;

use DevilSwarm\BashCommand\GetIPAddresses;
use DevilSwarm\BashCommand\InitSwarm;
use DevilSwarm\BashCommand\InstallCurl;
use DevilSwarm\BashCommand\InstallDocker;
use DevilSwarm\BashCommand\InstallNetTools;
use DevilSwarm\BashCommand\LocalCommand;
use DevilSwarm\BashCommand\SetHostName;
use DevilSwarm\BashCommand\UpdatePackages;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class InitCommand extends Command
{
    /**
     * Init devilSwarm
     *
     * @var string
     */
    public const NAME = 'init';

    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME)
            ->setDescription('Init DevilSwarm')
            ->addOption('advertise-addr', null, InputOption::VALUE_OPTIONAL, 'Advertised address (format: <ip|interface>[:port])');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        (new InstallNetTools(new InstallCurl(new SetHostName('swarm-master-1', new UpdatePackages(new LocalCommand())))))->execute();

        $advertiseIP = $input->getOption('advertise-addr');
        if (!$advertiseIP) {
            $advertiseIP = $this->getAdvertiseIP($input, $output);
        }
        $output->writeln('Swarm advertise ip: '.$advertiseIP);

        (new InitSwarm($advertiseIP, new InstallDocker(new LocalCommand())))->execute();
        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return string|null
     */
    protected function getAdvertiseIP(InputInterface $input, OutputInterface $output): ?string
    {
        $deviceIPs = [];
        $command = new GetIPAddresses($deviceIPs, new LocalCommand());
        $command->execute();

        $ip = null;
        if (count($deviceIPs) === 0) {
            $ip = null;
        }
        if (count($deviceIPs) === 1) {
            $ip = $deviceIPs[0];
        } else {
            $helper = $this->getHelper('question');
            $question = new ChoiceQuestion(
                'Please select advertise IP',
                $deviceIPs,
                0
            );

            $question->setErrorMessage('Selected option (%s) is invalid.');
            $ip = $helper->ask($input, $output, $question);
        }
        return $ip;
    }
}
