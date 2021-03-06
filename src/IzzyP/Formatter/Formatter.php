<?php namespace IzzyP\Formatter;

use InvalidArgumentException;
use IzzyP\Formatter\Parsers\ArrayParser;
use IzzyP\Formatter\Parsers\CsvParser;
use IzzyP\Formatter\Parsers\JsonParser;
use IzzyP\Formatter\Parsers\XmlParser;
use IzzyP\Formatter\Parsers\YamlParser;

class Formatter {
	/**
	 * Add class constants that help define input format
	 */
	const CSV  = 'csv';
	const JSON = 'json';
	const XML  = 'xml';
	const ARR  = 'array';
	const YAML = 'yaml';

	private static $supportedTypes = [self::CSV, self::JSON, self::XML, self::ARR, self::YAML];
	private $parser;

	/**
	 * Make: Returns an instance of formatter initialized with data and type
	 *
	 * @param mixed $data The data that formatter should parse
	 * @param string $type The type of data formatter is expected to parse
	 *
	 * @return Formatter
	 */
	public function make($data, $type) {
		if (in_array($type, self::$supportedTypes)) {
			$parser = null;
			switch ($type) {
				case self::CSV:
					$parser = new CsvParser($data);
					break;
				case self::JSON:
					$parser = new JsonParser($data);
					break;
				case self::XML:
					$parser = new XmlParser($data);
					break;
				case self::ARR:
					$parser = new ArrayParser($data);
					break;
				case self::YAML:
					$parser = new YamlParser($data);
					break;
			}
			return new Formatter($parser, $type);
		}
		throw new InvalidArgumentException(
			'make function only accepts [csv, json, xml, array] for $type but ' . $type . ' was provided.'
		);
	}

	public function __construct($parser = null) {
		$this->parser = $parser;
	}

	public function toJson() {
		return $this->parser->toJson();
	}

	public function toArray() {
		return $this->parser->toArray();
	}

	public function toYaml() {
		return $this->parser->toYaml();
	}

	public function toXml($baseNode = 'xml') {
		return $this->parser->toXml($baseNode);
	}

	public function toCsv() {
		return $this->parser->toCsv();
	}
}
