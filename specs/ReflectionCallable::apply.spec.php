<?php

use Technically\ReflectionCallable\ReflectionCallable;

describe('ReflectionCallable::apply()', function () {
    it('should call reflected callable without arguments', function () {
        $reflection = new ReflectionCallable(function () {
            return 'hello';
        });

        assert($reflection->apply() === 'hello');
    });

    it('it should reflected callable with numeric arguments array', function () {
        $reflection = new ReflectionCallable(function (string $name, string $greeting = 'Hello') {
            return "{$greeting}, {$name}!";
        });

        assert($reflection->apply(['Jordi']) === 'Hello, Jordi!');
        assert($reflection->apply(['Spok', 'Live and prosper']) === 'Live and prosper, Spok!');
    });

    it('it should reflected callable with named arguments array', function () {
        $reflection = new ReflectionCallable(function (string $name, string $greeting = 'Hello') {
            return "{$greeting}, {$name}!";
        });

        assert($reflection->apply(['name' => 'Jordi']) === 'Hello, Jordi!');
        assert($reflection->apply(['name' => 'Spok', 'greeting' => 'Live and prosper']) === 'Live and prosper, Spok!');
    });

    it('it should reflected callable with mixed arguments array', function () {
        $reflection = new ReflectionCallable(function (string $name, string $greeting = 'Hello') {
            return "{$greeting}, {$name}!";
        });

        assert($reflection->apply(['Jordi']) === 'Hello, Jordi!');
        assert($reflection->apply(['Spok', 'greeting' => 'Live and prosper']) === 'Live and prosper, Spok!');
    });
});