<?php

declare(strict_types=1);

namespace phpDocumentor\Guides\RestructuredText\Parser\Table;

use phpDocumentor\Guides\RestructuredText\MarkupLanguageParser;
use phpDocumentor\Guides\RestructuredText\Parser\LineChecker;

interface TableBuilder
{
    public function buildNode(ParserContext $context, MarkupLanguageParser $parser, LineChecker $lineChecker);
}
