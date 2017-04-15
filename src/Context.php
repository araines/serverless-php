<?php

namespace Raines\Serverless;

use Psr\Log\LoggerInterface;

/**
 * Context object allows you to access useful information within the Lambda
 * execution environment.  More information can be found here:
 * http://docs.aws.amazon.com/lambda/latest/dg/java-context-object.html
 *
 * @method string getMemoryLimitInMB()    Memory limit in MB for the Lambda function.
 * @method string getFunctionName()       Name of the Lambda function that is running.
 * @method string getFunctionVersion()    The Lambda function version that is executing.
 * @method string getInvokedFunctionArn() The ARN used to invoke this function.
 * @method string getAwsRequestId()       AWS request ID associated with the request.
 * @method string getLogStreamName()      The CloudWatch log stream name.
 * @method string getLogGroupName()       The CloudWatch log group name.
 * @method array  getClientContext()      Mobile SDK context information.
 * @method array  getIdentity():          Mobile SDK Cognito identity information.
 */
class Context
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var array
     */
    private $contextData;

    /**
     * @var 
     */
    private $fd;

    /**
     * @param LoggerInterface $logger      The logger
     * @param string          $contextData Context data in JSON format
     * @param resource        $fd          The file descriptor for node communication
     */
    public function __construct(LoggerInterface $logger, string $contextData, $fd)
    {
        $this->logger = $logger;
        $this->contextData = json_decode($contextData, true);
        $this->fd = $fd;
    }

    public function __call($name, $args)
    {
        if (substr($name, 0, 3) !== 'get') {
            throw new \BadMethodCallException();
        }
        $key = lcfirst(substr($name, 3));

        return $this->contextData[$key] ?? null;
    }

    /**
     * Remaining execution time till the function will be terminated, in
     * milliseconds. At the time you create the Lambda function you set maximum
     * time limit, at which time AWS Lambda will terminate the function
     * execution. Information about the remaining time of function execution
     * can be used to specify function behavior when nearing the timeout.
     *
     * @return int
     */
    public function getRemainingTimeInMillis() : int
    {
        fwrite($this->fd, 'x');

        return (int) fgets($this->fd);
    }

    /**
     * Returns the Lambda logger associated with the Context object.
     *
     * @return LoggerInteface
     */
    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }
}
