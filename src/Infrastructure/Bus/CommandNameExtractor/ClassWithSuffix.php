<?php
declare(strict_types=1);

namespace TacticianSfDi\Infrastructure\Bus\CommandNameExtractor;

use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;

class ClassWithSuffix implements CommandNameExtractor
{
    private $suffix;

    public function __construct(string $suffix)
    {
        $this->suffix = $suffix;
    }

    public function extract($command)
    {
        return sprintf('%s%s', get_class($command), $this->suffix);
    }
}
