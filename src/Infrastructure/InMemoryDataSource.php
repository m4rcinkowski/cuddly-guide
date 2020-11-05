<?php

declare(strict_types=1);

namespace App\Infrastructure;

use Psr\Log\LoggerInterface;

final class InMemoryDataSource implements DataSourceInterface
{
    private array $store = [];
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function add(array $fields)
    {
        $this->store[] = array_merge(
            $fields,
            ['id' => rand()],
        );
        $this->logger->info(sprintf('New product added: %s', json_encode($fields)));
    }
}
