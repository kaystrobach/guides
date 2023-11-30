<?php

declare(strict_types=1);

namespace phpDocumentor\Guides\ReferenceResolvers;

use phpDocumentor\Guides\Nodes\Inline\LinkInlineNode;
use phpDocumentor\Guides\Nodes\Inline\ReferenceNode;
use phpDocumentor\Guides\RenderContext;
use phpDocumentor\Guides\Renderer\UrlGenerator\UrlGeneratorInterface;

/**
 * Resolves references with an anchor URL.
 *
 * A link is an anchor if it starts with a hashtag
 */
class AnchorReferenceResolver implements ReferenceResolver
{
    public final const PRIORITY = -100;

    public function __construct(
        private readonly AnchorReducer $anchorReducer,
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {
    }

    public function resolve(LinkInlineNode $node, RenderContext $renderContext): bool
    {
        if (!$node instanceof ReferenceNode) {
            return false;
        }

        $reducedAnchor = $this->anchorReducer->reduceAnchor($node->getTargetReference());

        $target = $renderContext->getProjectNode()->getInternalTarget($reducedAnchor, $node->getLinkType());

        if ($target === null) {
            return false;
        }

        $node->setUrl($this->urlGenerator->generateCanonicalOutputUrl($renderContext, $target->getDocumentPath(), $target->getAnchor()));
        if ($node->getValue() === '') {
            $node->setValue($target->getTitle() ?? '');
        }

        return true;
    }

    public static function getPriority(): int
    {
        return self::PRIORITY;
    }
}
