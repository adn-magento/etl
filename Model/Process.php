<?php

/**
 * @category  Adn
 * @package   Adn\Etl
 * @copyright 2022 Adn
 * @license   OSL-3.0 https://opensource.org/licenses/OSL-3.0
 */

declare(strict_types=1);

namespace Adn\Etl\Model;

use Adn\Etl\Model\Process\ExtractorInterface;
use Adn\Etl\Model\Process\TransformerInterface;
use Adn\Etl\Model\Process\LoaderInterface;

class Process implements ProcessInterface
{
    /** @var string */
    private string $name;
    /** @var ExtractorInterface */
    private ExtractorInterface $extractor;
    /** @var TransformerInterface */
    private TransformerInterface $transformer;
    /** @var LoaderInterface */
    private LoaderInterface $loader;
    /** @var int */
    private int $bathSize;

    /**
     * Process constructor
     *
     * @param string $name Etl process name
     * @param ExtractorInterface $extractor Etl process extractor
     * @param TransformerInterface $transformer Etl process transformer
     * @param LoaderInterface $loader Etl process loader
     * @param int $bathSize batch size to load entries
     */
    public function __construct(
        string               $name,
        ExtractorInterface   $extractor,
        TransformerInterface $transformer,
        LoaderInterface      $loader,
        int                  $bathSize = 0
    )
    {
        $this->name         = $name;
        $this->extractor    = $extractor;
        $this->transformer  = $transformer;
        $this->loader       = $loader;
        $this->bathSize     = $bathSize;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ExtractorInterface
     */
    public function getExtractor(): ExtractorInterface
    {
        return $this->extractor;
    }

    /**
     * Get extractor
     *
     * @return TransformerInterface
     */
    public function getTransformer(): TransformerInterface
    {
        return $this->transformer;
    }

    /**
     * Get loader
     *
     * @return LoaderInterface
     */
    public function getLoader(): LoaderInterface
    {
        return $this->loader;
    }

    /**
     * Get batch size
     *
     * @return int
     */
    public function getBathSize(): int
    {
        return $this->bathSize;
    }
}
