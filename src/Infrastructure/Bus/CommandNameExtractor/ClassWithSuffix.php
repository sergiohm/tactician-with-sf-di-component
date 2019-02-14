<?php
declare(strict_types=1);

namespace TacticianSfDi\Infrastructure\Bus\CommandNameExtractor;

use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;

class ClassWithSuffix implements CommandNameExtractor
{
    public function extract($command)
    {
        return get_class($command) . '.handler';
    }
}
