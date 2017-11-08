<?php
declare(strict_types = 1);
namespace Test\ns1;

class TestClass__AopProxied {

    public function publicMethod() {}

    protected function protectedMethod() {}

    public static function publicStaticMethod() {}

    protected static function protectedStaticMethod() {}

    public function publicMethodDynamicArguments($a, &$b)
    {
        $args = func_get_args();
        call_user_func_array([$this, 'publicMethodFixedArguments'], $args);
    }

    public function publicMethodFixedArguments($a, $b, $c = null) {}
}


class TestClass extends TestClass__AopProxied implements \Go\Aop\Proxy
{

    /**
     * Property was created automatically, do not change it manually
     */
    private static $__joinPoints = [
        'method' => [
            'publicMethod' => [
                'advisor.Test\\ns1\\TestClass->publicMethod'
            ],
            'protectedMethod' => [
                'advisor.Test\\ns1\\TestClass->protectedMethod'
            ],
            'publicStaticMethod' => [
                'advisor.Test\\ns1\\TestClass->publicStaticMethod'
            ],
            'protectedStaticMethod' => [
                'advisor.Test\\ns1\\TestClass->protectedStaticMethod'
            ],
            'publicMethodDynamicArguments' => [
                'advisor.Test\\ns1\\TestClass->publicMethodDynamicArguments'
            ],
            'publicMethodFixedArguments' => [
                'advisor.Test\\ns1\\TestClass->publicMethodFixedArguments'
            ]
        ]
    ];

    public function publicMethod()
    {
        return self::$__joinPoints['method:publicMethod']->__invoke($this);
    }

    protected function protectedMethod()
    {
        return self::$__joinPoints['method:protectedMethod']->__invoke($this);
    }

    public static function publicStaticMethod()
    {
        return self::$__joinPoints['static:publicStaticMethod']->__invoke(static::class);
    }

    protected static function protectedStaticMethod()
    {
        return self::$__joinPoints['static:protectedStaticMethod']->__invoke(static::class);
    }

    public function publicMethodDynamicArguments($a, &$b)
    {
        return self::$__joinPoints['method:publicMethodDynamicArguments']->__invoke($this, [$a, &$b]);
    }

    public function publicMethodFixedArguments($a, $b, $c = NULL)
    {
        return self::$__joinPoints['method:publicMethodFixedArguments']->__invoke($this, \array_slice([$a, $b, $c], 0, \func_num_args()));
    }

}
\Go\Proxy\ClassProxy::injectJoinPoints(TestClass::class);
