<?php

namespace Raines\Serverless;

interface Handler
{
    /**
     * Handle the Lambda event.
     *
     * @param array   $event   The event information array.
     * @param Context $context The Context object.
     *
     * @return mixed Response for the lambda. Must be json encodeable.
     */
    public function handle(array $event, Context $context);
}
