<?php

declare(strict_types=1);

namespace phpDocumentor\Guides;

use League\Flysystem\FilesystemInterface;
use League\Uri\Uri;
use League\Uri\UriInfo;
use phpDocumentor\Guides\Nodes\ProjectNode;

use function dirname;
use function ltrim;

class ParserContext
{
    public function __construct(
        private readonly ProjectNode $projectNode,
        private readonly string $currentFileName,
        private readonly string $currentDirectory,
        private readonly int $initialHeaderLevel,
        private readonly FilesystemInterface $origin,
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {
    }

    public function getProjectNode(): ProjectNode
    {
        return $this->projectNode;
    }

    public function getInitialHeaderLevel(): int
    {
        return $this->initialHeaderLevel;
    }

    public function absoluteRelativePath(string $url): string
    {
        $uri = Uri::createFromString($url);
        if (UriInfo::isAbsolutePath($uri)) {
            return $this->currentDirectory . '/' . ltrim($url, '/');
        }

        return $this->currentDirectory . '/' . $this->getDirName() . '/' . ltrim($url, '/');
    }

    public function getDirName(): string
    {
        $dirname = dirname($this->currentFileName);

        if ($dirname === '.') {
            return '';
        }

        return $dirname;
    }

    public function getCurrentFileName(): string
    {
        return $this->currentFileName;
    }

    /** @return array<string, string> */
    public function getLoggerInformation(): array
    {
        return [
            'rst-file' => $this->currentFileName,
        ];
    }

    public function getOrigin(): FilesystemInterface
    {
        return $this->origin;
    }

    public function getCurrentDirectory(): string
    {
        return $this->currentDirectory;
    }

    public function getUrl(): string
    {
        return $this->currentFileName;
    }

    /**
     * Return the current file's absolute path on the Origin file system.
     *
     * In order to load files relative to the current file (such as embedding UML diagrams) the environment
     * must expose what the absolute path relative to the Origin is.
     *
     * @see self::setCurrentAbsolutePath() for more information
     * @see self::getOrigin() for the filesystem on which to use this path
     */
    public function getCurrentAbsolutePath(): string
    {
        return $this->urlGenerator->absoluteUrl($this->currentDirectory, $this->currentFileName);
    }
}
