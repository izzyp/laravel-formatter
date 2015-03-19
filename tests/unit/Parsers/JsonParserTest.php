<?php namespace IzzyP\Formatter\Test\Parsers;

use IzzyP\Formatter\Test\TestCase;
use IzzyP\Formatter\Parsers\Parser;
use IzzyP\Formatter\Parsers\JsonParser;

class JsonParserTest extends TestCase {

	public function testJsonParserIsInstanceOfParserInterface() {
		$parser = new JsonParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresentationOfJsonObject() {
		$expected = ['foo' => 'bar'];
		$parser = new JsonParser('{"foo": "bar"}');
		$this->assertEquals($expected, $parser->toArray());
	}

	public function testtoJsonReturnsArrayRepresentationOfArray() {
		$expected = '[0,1,2]';
		$parser = new JsonParser($expected);
		$this->assertEquals($expected, $parser->toJson());
	}

	public function testtoJsonReturnsJsonRepresentationOfNamedArray() {
		$expected = '{"foo":"bar"}';
		$parser = new JsonParser($expected);
		$this->assertEquals($expected, $parser->toJson());
	}
}
