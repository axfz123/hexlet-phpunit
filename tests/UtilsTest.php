<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Utils\reverseString;

// Класс UtilsTest наследует класс TestCase
// Имя класса совпадает с именем файла
class UtilsTest extends TestCase
{
    public function getFixtureFullPath($fixtureName)
    {
        $parts = [__DIR__, 'fixtures', $fixtureName];
        return realpath(implode('/', $parts));
    }

    public function testReverse(): void
    {
        $this->assertEquals('', reverseString(''));
        $this->assertEquals('olleh', reverseString('hello'));
    }

    public function testReverseFile(): void
    {
        $text = file_get_contents($this->getFixtureFullPath('someText.txt'));
        $this->assertStringEqualsFile($this->getFixtureFullPath('someTextReversed.txt'), reverseString($text));
    }
}
