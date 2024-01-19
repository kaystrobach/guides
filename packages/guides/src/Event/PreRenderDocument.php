<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link https://phpdoc.org
 */

namespace phpDocumentor\Guides\Event;

use phpDocumentor\Guides\Handlers\RenderDocumentCommand;
use phpDocumentor\Guides\NodeRenderers\NodeRenderer;
use phpDocumentor\Guides\Nodes\DocumentNode;

/**
 * This event is called before the rendering of each document.
 */
final class PreRenderDocument
{
    /** @param NodeRenderer<DocumentNode> $renderer */
    public function __construct(private readonly NodeRenderer $renderer, private readonly RenderDocumentCommand $command)
    {
    }

    /** @return NodeRenderer<DocumentNode> */
    public function getRenderer(): NodeRenderer
    {
        return $this->renderer;
    }

    public function getCommand(): RenderDocumentCommand
    {
        return $this->command;
    }
}
