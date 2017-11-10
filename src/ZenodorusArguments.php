<?php namespace Zenodorus;

class ZenodorusArguments
{
    protected $arguments;
    protected $defaults;
    protected $processed;

    public function __construct(array $arguments, array $defaults = [])
    {
        $this->setProp('arguments', $arguments);
        $this->setProp('defaults', $defaults);
        $this->setProp('processed', $this->applyDefaults($this->arguments, $this->defaults));
    }

    /**
     * Set a property on the ZenodorusArguments object.
     *
     * @param string $property
     * @param mixed $value
     * @return void
     */
    protected function setProp(string $property, $value)
    {
        if (\property_exists($this, $property)) {
            $this->{$property} = $value;
        }
    }
   
    /**
     * Apply our defaults to the arguments we've passed in.
     *
     * @param array $arguments
     * @param array $defaults
     * @return array
     */
    protected function applyDefaults(array $arguments, array $defaults)
    {
        $processed = [];
        return \array_replace_recursive($defaults, $arguments);
    }

    /**
     * Get a specific value.
     * 
     * You can optionally pass a callback to process this value.
     *
     * @param string $property
     * @param string|function $callback
     * @return mixed
     */
    public function get(string $property, $callback = false)
    {
        if (isset($this->processed[$property])) {
            if ($callback) {
                return \call_user_func($callback, $this->processed[$property]);
            }

            return $this->processed[$property];
        }

        return false;
    }

    /**
     * Get all values.
     *
     * @return void
     */
    public function getAll()
    {
        return $this->processed;
    }

    /**
     * Simple ZenodorusArgument factory, for when you're too lazy to
     * instantiate a class.
     *
     * @param array $arguments
     * @param array $defaults
     * @return ZenodorusArgument
     */
    public static function build(array $arguments, array $defaults = [])
    {
        $Arguments = new static($arguments, $defaults);
        return $Arguments;
    }
}
