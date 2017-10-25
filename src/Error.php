<?php namespace Zenodorus;

class Error {

  const DEFAULTS = [
    'code' => "generic",
    'description' => "I'm afraid something has gone horribly wrong.",
    'data' => null,
  ];

  protected $code = null;
  protected $description = null;
  protected $data = null;

  public function __constuct(array $args)
  {
    $this->code = $args['code'];
    $this->description = $args['description'];
    $this->data = $args['data'];

    return $this;
  }

  public function __toString()
  {
    $return = null;
    foreach (['code', 'description', 'data'] as $key) {
      if ($this->$key) {
        $return .= sprintf("<dt>%s</dt>", $key);
        $return .= sprintf("<dd>%s</dd>", $this->$key);
      }
    }

    if ($return) {
      return sprintf("<dl>%s</dl>", $return);
    }

    return false;
  }

  protected function evaluateArgs(array $args)
  {
    $defaults = self::DEFAULTS;
    return array_merge($defaults, $args);
  }

  protected function get($prop)
  {
    if (property_exists($this, $prop)) {
      return $prop;
    } else {
      return false;
    }
  }

  public function getCode()
  {
    return $this->get('code');
  }

  public function getDescription()
  {
    return $this->get('description');
  }

  public function getData()
  {
    return $this->get('data');
  }
}