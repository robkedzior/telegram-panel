<?php

namespace Telegramapp\Telegram\AdminPanel\Console\Routes;

use Telegramapp\Telegram\AdminPanel\Compiler\StubFileCompiler;
use Telegramapp\Telegram\AdminPanel\Filesystem\Filesystem;

/**
 * Class ControllerResourceRoute.
 *
 * @package Telegramapp\Telegram\AdminPanel\Console\Routes
 */
class ControllerResourceRoute extends Route
{
    use Controller;

    /**
     * Route constructor.
     *
     * @param StubFileCompiler $compiler
     * @param Filesystem $filesystem
     */
    public function __construct(StubFileCompiler $compiler, Filesystem $filesystem)
    {
        parent::__construct($compiler, $filesystem);
    }

    /**
     * Get stub path.
     *
     * @return mixed
     */
    protected function getStubPath()
    {
        return __DIR__ . '/../stubs/route_with_resource_controller.stub';
    }

    /**
     * Obtain replacements for stub.
     *
     * @return mixed
     */
    protected function obtainReplacements()
    {
        return [
            'ROUTE_LINK' => $this->getReplacements()[0],
            'ROUTE_CONTROLLER' => $this->controller($this->getReplacements()[1]),
        ];
    }
}
