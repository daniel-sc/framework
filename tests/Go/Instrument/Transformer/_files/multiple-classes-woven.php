<?php
declare(strict_types = 1);

namespace Test\ns3;

class TestClass1__AopProxied {
    public static function test() {}
}

class TestClass1 extends TestClass1__AopProxied implements \Go\Aop\Proxy
{

    /**
     * Property was created automatically, do not change it manually
     */
    private static $__joinPoints = [
        'method' => [
            'test' => [
                'advisor.Test\\ns3\\TestClass1->test'
            ]
        ]
    ];

    public static function test()
    {
        return self::$__joinPoints['static:test']->__invoke(static::class);
    }

}
\Go\Proxy\ClassProxy::injectJoinPoints(TestClass1::class);

TestClass1::test();

class TestClass11__AopProxied {
    public static function test() {}
}

class TestClass11 extends TestClass11__AopProxied implements \Go\Aop\Proxy
{

    /**
     * Property was created automatically, do not change it manually
     */
    private static $__joinPoints = [
        'method' => [
            'test' => [
                'advisor.Test\\ns3\\TestClass11->test'
            ]
        ]
    ];

    public static function test()
    {
        return self::$__joinPoints['static:test']->__invoke(static::class);
    }

}
\Go\Proxy\ClassProxy::injectJoinPoints(TestClass11::class);

TestClass11::test();

class TestClass2__AopProxied {
    public static function test() {}
}

class TestClass2 extends TestClass2__AopProxied implements \Go\Aop\Proxy
{

    /**
     * Property was created automatically, do not change it manually
     */
    private static $__joinPoints = [
        'method' => [
            'test' => [
                'advisor.Test\\ns3\\TestClass2->test'
            ]
        ]
    ];

    public static function test()
    {
        return self::$__joinPoints['static:test']->__invoke(static::class);
    }

}
\Go\Proxy\ClassProxy::injectJoinPoints(TestClass2::class);

TestClass2::test();
