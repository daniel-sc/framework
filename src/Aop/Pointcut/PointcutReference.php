<?php
declare(strict_types = 1);
/*
 * Go! AOP framework
 *
 * @copyright Copyright 2015, Lisachenko Alexander <lisachenko.it@gmail.com>
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Go\Aop\Pointcut;

use Go\Aop\Pointcut;
use Go\Aop\PointFilter;
use Go\Core\AspectContainer;
use Go\Core\AspectKernel;

/**
 * Reference to the pointcut holds an id of pointcut to fetch when needed
 */
class PointcutReference implements Pointcut
{
    /**
     * @var Pointcut
     */
    protected $pointcut;

    /**
     * Name of the pointcut to fetch from the container
     *
     * @var string
     */
    private $pointcutName;

    /**
     * Instance of aspect container
     *
     * @var AspectContainer
     */
    private $container;

    /**
     * Pointcut reference constructor
     *
     * @param AspectContainer $container Instance of container
     * @param string $pointcutName Referenced pointcut
     */
    public function __construct(AspectContainer $container, string $pointcutName)
    {
        $this->container    = $container;
        $this->pointcutName = $pointcutName;
    }

    /**
     * Performs matching of point of code
     *
     * @param mixed $point Specific part of code, can be any Reflection class
     * @param null|mixed $context Related context, can be class or namespace
     * @param null|string|object $instance Invocation instance or string for static calls
     * @param null|array $arguments Dynamic arguments for method
     *
     * @return bool
     */
    public function matches($point, $context = null, $instance = null, array $arguments = null): bool
    {
        return $this->getPointcut()->matches($point, $context, $instance, $arguments);
    }

    /**
     * Returns the kind of point filter
     */
    public function getKind(): int
    {
        return $this->getPointcut()->getKind();
    }

    /**
     * Return the class filter for this pointcut.
     */
    public function getClassFilter(): PointFilter
    {
        return $this->getPointcut()->getClassFilter();
    }

    /**
     * {@inheritdoc}
     */
    public function __sleep()
    {
        return ['pointcutName'];
    }

    /**
     * {@inheritdoc}
     */
    public function __wakeup()
    {
        $this->container = AspectKernel::getInstance()->getContainer();
    }

    /**
     * Returns a real pointcut from the container
     */
    private function getPointcut(): Pointcut
    {
        if (!$this->pointcut) {
            $this->pointcut = $this->container->getPointcut($this->pointcutName);
        }

        return $this->pointcut;
    }
}
