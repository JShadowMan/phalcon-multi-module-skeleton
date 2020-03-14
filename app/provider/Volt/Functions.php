<?php
/**
 * This file is part of phalcon-skeleton
 *
 * @copyright Copyright (C) 2020 Jayson Wang
 * @license   MIT License
 * @link      https://github.com/wjiec/phalcon-skeleton
 */
namespace App\Provider\Volt;


use Phalcon\Mvc\View\Engine\Volt\Compiler;

/**
 * Class Functions
 * @package App\Provider\Volt
 */
class Functions {

    /**
     * @var Compiler
     */
    protected $compiler;

    /**
     * Functions constructor.
     * @param Compiler $compiler
     */
    public function __construct(Compiler $compiler) {
        $this->compiler = $compiler;
    }

    /**
     * Compile any function call in a template.
     *
     * @noinspection PhpUnused
     * @param string $name
     * @param mixed $arguments
     * @param array[] $args
     * @return string|null
     */
    public function compileFunction(string $name, $arguments, $args): ?string {
        switch ($name) {
            case 'join':
                return "join(',', {$arguments})";
            case '_t':
                return sprintf('$this->translator->t(%s)', $arguments);
            case 'exp':
                return sprintf('(!empty(%s) ? (%s) : (%s))', $this->compiler->expression($args[0]['expr']),
                    $this->compiler->expression($args[1]['expr']), $this->compiler->expression($args[2]['expr']));
            default:
                return null;
        }
    }

    /**
     * Compile some filters
     *
     * @noinspection PhpUnused
     * @param string $name
     * @param $arguments
     * @return string|null
     */
    public function compileFilter(string $name, $arguments): ?string {
        switch ($name) {
            default:
                return null;
        }
    }

}
