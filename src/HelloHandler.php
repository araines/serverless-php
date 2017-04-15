<?php

namespace Raines\Serverless;

class HelloHandler implements Handler
{
    /**
     * {@inheritdoc}
     */
    public function handle(array $event, Context $context)
    {
        $logger = $context->getLogger();
        $logger->notice('Got event', $event);

        return [
            'statusCode' => 200,
            'body' => 'Go Serverless v1.0! Your function executed successfully!',
        ];
    }
}
