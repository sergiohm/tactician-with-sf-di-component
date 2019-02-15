<?php
declare(strict_types=1);

namespace TacticianSfDi\Infrastructure\Bus\Middleware;

use League\Tactician\Middleware;
use TacticianSfDi\Util\Domain\Bus\Message;

/**
 * Message instance of checking to simplify the implementation
 */
class ScreenPrintingMessageLogger implements Middleware
{
    /**
     * @var Message $command
     */
    public function execute($command, callable $next)
    {
        try {
            echo $this->serializeLog(
                new \DateTimeImmutable(),
                $command instanceof Message ? $command->messageType(): 'Not a Message',
                'debug',
                $command instanceof Message ? json_encode($command): 'Not a Message'
            ) . PHP_EOL;

            $next($command);

        } catch (\Exception $e) {

            $context = [
                'exception' => [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode()
                    ],
                'message' => $command instanceof Message ? $command: 'Not a Message',
            ];

            echo $this->serializeLog(
                    new \DateTimeImmutable(),
                    $command instanceof Message ? $command->messageType(): 'Not a Message',
                    'error',
                    json_encode($context)
                ) . PHP_EOL;

            throw $e;
        }
    }

    private function serializeLog(\DateTimeInterface $occurredOn, string $name, string $level, string $context): string
    {
        return sprintf(
            '[%s] %s.%s: %s',
            $occurredOn->format('Y-m-d H:i:s'),
            $name,
            strtoupper($level),
            $context
        );
    }
}
