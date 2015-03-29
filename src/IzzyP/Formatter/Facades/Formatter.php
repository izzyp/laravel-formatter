<?php namespace IzzyP\Formatter\Facades;

use Illuminate\Support\Facades\Facade;

class Formatter extends Facade {

  const CSV  = \IzzyP\Formatter\Formatter::CSV ;
  const JSON = \IzzyP\Formatter\Formatter::JSON;
  const XML  = \IzzyP\Formatter\Formatter::XML ;
  const ARR  = \IzzyP\Formatter\Formatter::ARR ;
  const YAML = \IzzyP\Formatter\Formatter::YAML;

  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'formatter'; }
}