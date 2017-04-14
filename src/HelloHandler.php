<?php

namespace Raines\Serverless;

use Psr\Log\LoggerInterface;

class HelloHandler implements Handler
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(array $event)
    {
        $this->logger->notice('Got event', $event);

        return [
            'statusCode' => 200,
            'body' => 'Go Serverless v1.0! Your function executed successfully!',
        ];
    }
}
