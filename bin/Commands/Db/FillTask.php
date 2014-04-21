<?php

namespace Commands\Db;

use App\InvalidStateException;
use App\Model\RepositoryContainer;
use App\Model\UsersRepository;
use Commands\Command;
use Nelmio\Alice\ORM\Porm;
use Nelmio\Alice\Loader\Porm as Loader;
use Nette\Utils\Strings;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class FillTask extends Command
{

	private $youtubeIdIndex = 0;

	public function setup()
	{
		$this->setDescription('Fill database with fake data');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		/** @var RepositoryContainer $orm */
		$orm = $this->container->getService('orm');

		$repos = $this->container->parameters['repositories'];
		$map = [];
		foreach ($repos as $name => $repo)
		{
			$map[$orm->$name->getEntityClassName()] = $name;
		}

		$loader = new Loader('cs_CZ', [$this]);
//		$loader->addProccessor(function($key, $value) {
//			if ($value === '<youtubeId()>')
//			{
//				return $this->getYoutubeId();
//			}
//			return $value;
//		});
		$loader->setOrmMap($orm, $map);
		$loader->setLogger(function ($log) use ($output)
		{
			$output->writeln("<info>$log</info>");
		});

		$objects = $loader->load(__DIR__ . '/../../../app/fixtures.yml');

		try
		{
			$persist = new Porm($orm, $map);
			$persist->persist($objects);
		}
		catch (\DibiDriverException $e)
		{
			if (strpos($e->getMessage(), 'duplicate key') !== FALSE) // code not set
			{
				$output->writeln("<error>Duplicate entry, you are probably running on already populated database</error>");
				$output->writeln("<comment>Reset database with <cmd>db:reset</cmd>, <cmd>db:migrate</cmd></comment>");
				exit(1);
			}
			$output->writeln("<error>Database error. Do you have most recent migrations?</error>");
			$output->writeln($e->getMessage());
			exit(1);
		}
		$output->writeln("<info>Database filled with fake data</info>");
	}

	/**
	 * Formatter
	 * @return string
	 */
	public function youtubeId()
	{
		$ids = ['8-5DTsl1V5k', '8183HPmA2_I', '81SseQCpGws', '86NwKBcOlow', '8aeivxR1GDc', '8CluknrLeys', '8Ft5iHhauJ0', '8fxilNdEQTo', '8i0j3j16yFk', '8In5PK1yUAA', '8IR5LefXVPY', '8jlMuBn6Zow', '8JYP_wU1JTU', '8M4c8TB3Cdc', '8NJEeEUUhaI', '8nW9L7cSop4', '8qfzpJvsp04', '8SAMey9Gl5I', '8Wxw9bpKEGQ', '8wYvKeSK1IY', '8x1-TeDxblU', '8Y4JSp5U82I', '8YLZ1A0du3o', '9-u4zP5s9is', '92aLiyeQj0w', '92U67CUy9Gc', '93xzevZ9pjU', '94O_3QCvfqI', '98qfFzqDKR8', '98Wc6IoFpoc', '9CZfG3r5JBE', '9e9GWdT2pEQ', '9G0w61pZPig', '9hM32lsQ4aI', '9LgyKiq_hU0', '9NVQsQLPOqc', '9ODhKqFaugQ', '9P80OLC6wKY', '9QduzzW10uA', '9qEaVwIXqR4', '9REPnibO4IQ', '9T3AAn-Cw3g', '9ThXDY9Y3oU', '9uwLgf84p5w', '9vI1kP-9zpw', '9wguQaBYKec', '9YjXGLWMvCM', 'a-R8qpea6lc', 'a2Ia_ZlUCaQ', 'a3NFAnHxpKw', 'A3vkqYgJ93c', 'A5r7wkwDID4', 'a5sFUXkxyGc', 'a70-dYvDJZY', 'A8GQfq3U96M', 'a9aUMpGs6c8', 'a9QtIfPIQl4', 'Aa1CMokCch4', 'AA6RfgP-AHU', 'aASUZqJCHHA', 'AAWsuFXojgo', 'AC_kjcuHpZw', 'acQYX4nwhCk', 'AEIzy1kNRqo', 'aeyFb2eVH1c', 'AGFO-ROxH_I', 'ahXIMUkSXX0', 'aKhhYguY0DQ', 'ALhv3Rlydig', 'aNkrawaaiZQ', 'ANyVpMS3HL4', 'aOeKj-w-3fY', 'AoRpWU6hHJ8', 'aOSlXuDO4UU', 'aoXUWSwiDzE', 'APNkWrD-U1k', 'aq_XL6FrmGs', 'AqFwKecNaTk', 'ArvnBba_ogI', 'ARysRxZJmaA', 'asLQmxK7ExY', 'AsqEkF7hcII', 'ATuMxyoVh_8', 'aubZU0iWtgI', 'AuCH7fHZsZ4', 'AuD2TX-90Cc', 'Av_Us6xHkUc', 'awzOvyMKeMA', 'axB6uhEx628', 'Axox0C6aoTo', 'ay1QGPg2R98', 'b_cAxh44aNQ', 'B_P48TakY3Y', 'b-6pqRnm2b8', 'B0R3MJOrST0', 'b1QFKLZC11U', 'b1YtRTke_M0', 'b2C9I8HuCe4', 'b6VQv76BQDs', 'b9H22F0Qbgw', 'Badvask-UDU', 'bcrsyGxUbkA', 'bCxMhncR7PU', 'Bd5X7Kz_Bpg', 'Bdbc1ZC-vhw', 'BDo3L3vqE6M', 'BDWqwcTtZa0', 'bfy6IxsN_lg', 'BgFJD7oCmDE', 'bhE7cHE4wF0', 'BHTMuHvmarU', 'BIGX05Mp5nw', 'bihBbqzL96Y', 'BiVOC3WocXs', 'BIZNBfBuu1w', 'bJ_09eoCmag', 'bJF9R8_-0O0', 'bjVn4WGmNis', 'bjWOG50PfdI', 'bkNMM8uiMww', 'BkwI6Uu0vi4', 'bLQBbA8yh7c', 'BMNj7-Okclk', 'BNHLzEv6Mjg', 'BP5mCFyBCq8', 'bPqB9a1uk_8', 'bQ5DJUhV6vk', 'Bq9cq9FZuNM', 'BQMyeQOLvpg', 'br7tS1t2SFE', 'BRUOACBkFRg', 'BRX5mWU0pKo', 'bRZmfc1YFsQ', 'bS6EmYzpou4', 'BTNarhvGX88', 'BTWLwoaNeBA', 'bTz_tx460EY', 'bwOE1MEginA', 'BWs-ONRDDG4', 'By-ggTfeuJU', 'bYyxwxEqTQo', 'BZmtnCqTWik', 'C_H-ONQFjpQ', 'C-2Ln0pK3kY', 'C0frzmxc5KU', 'C1pHvEAKmLA', 'c38H6UKt3_I', 'c4fUaD4g4mc', 'C5-lz0hcqsE', 'C6PUlTYnxLY', 'C8mudsCSmcU', 'cAt6MYoGqJ4', 'cBBTWcHkVVY', 'cc8sUv2SuaY', 'cCMpin3Te4s', 'cDpBtkU2cf8', 'cdRLBOnLTDk', 'CFBKfgGTP98', 'CfBYGFm5gPA', 'CfJzrmS9UfY', 'cfr-yZxTH8Y', 'CGA8sRwqIFg', 'CGrbnripinU', 'ch5tDNaeuxc', 'CH6FQhlZn6k', 'CHfU9EDwOwU', 'cIpEZXOAn0I', 'CJRQ8gOjq4E', 'CJzuu_k9Nv0', 'cLICU2cDHrs', 'CLWpkv6ccpA', 'ClYdw4d4OmA', 'cNFLqhU4MN0', 'cNm196bVE5A', 'CnXuSCaCNBo', 'cppxO67e6eo', 'croM4PvOdbM', 'CrV1xCWdY-g', 'CTKMK1ZGLuk', 'cugQ4z4cJF8', 'cvB8b4AACyE', 'cWn6g8Qqvs4', 'cxs1d3N60UI', 'CYmL-Up_ZNc', 'CyNjK7dv-IM', 'CYNUwiUzlPk', 'cZuYdIRAIAs', 'czY5nyvZ7cU', 'd-_eqgj5-K8', 'd-2Lcp0QKfI', 'D0Nb2Fs3Q8c', 'D1eibbfAEVk', 'D2sMsmL0ScQ', 'D4nK5uXuPXM', 'd4UQFgAdxUs', 'D5ymMYcLtv0'];
		if (!isset($ids[$this->youtubeIdIndex]))
		{
			throw new InvalidStateException('Not enough youtube ids');
		}
		$id = $ids[$this->youtubeIdIndex];
		$this->youtubeIdIndex++;
		return $id;
	}

}
