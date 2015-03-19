<?php namespace IzzyP\Formatter\Test\Parsers;

use IzzyP\Formatter\Test\TestCase;
use IzzyP\Formatter\Parsers\Parser;
use IzzyP\Formatter\Parsers\YamlParser;
use IzzyP\Formatter\Parsers\XmlParser;

class YamlParserTest extends TestCase {

	public function testYamlParserIsInstanceOfParserInterface() {
		$parser = new YamlParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresenationOfYamlObject() {
		$expected = ['foo' => 'bar'];
		$parser = new XmlParser('<xml><foo>bar</foo></xml>');
		$x = new YamlParser($parser->toYaml());
		$this->assertEquals($expected, $x->toArray());
	}

}
