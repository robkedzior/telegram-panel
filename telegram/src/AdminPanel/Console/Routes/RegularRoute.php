<?php

namespace Telegramapp\Telegram\AdminPanel\Console\Routes;

use Telegramapp\Telegram\AdminPanel\Compiler\StubFileCompiler;
use Telegramapp\Telegram\AdminPanel\Filesystem\Filesystem;

/**
 * Class RegularRoute.
 *
 * @package Telegramapp\Telegram\AdminPanel\Console\Routes
 */
class RegularRoute extends Route
{

    /**
     * RegularRoute constructor.
     *
     * @param StubFileCompiler $compiler
     * @param Filesystem $filesystem
     */
    public function __construct(StubFileCompiler $compiler, Filesystem $filesystem)
    {
        parent::__construct($compiler, $filesystem);
    }

    /**
     * Get path to stub.
     *
     * @return string
     */
    protected function getStubPath()
    {
        return __DIR__ . '/../stubs/route.stub';
    }

    /**
     * @return array
     */
    protected function obtainReplacements()
    {
        return [
            'ROUTE_LINK' => $link = $this->getReplacements()[0],
            'ROUTE_VIEW' => $this->getReplacements()[1],
            'ROUTE_METHOD' => $this->getReplacements()[2],
            'ROUTE_NAME' => dot_path($link),
        ];
    }
}
