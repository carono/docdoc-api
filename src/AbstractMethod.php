<?php


namespace carono\docdoc;


abstract class AbstractMethod extends \ArrayObject
{
    protected $client;
    protected $method;

    public function toArray()
    {
        $result = [];
        foreach ($this as $key => $value) {
            $result[$key] = $value;
        }
        return $result;
    }

    public function add($name, $value)
    {
        $this[$name] = $value;
    }

    public function getResult()
    {
        return $this->client->getContent($this->method, $this->toArray());
    }

    /**
     * @param $params
     * @return $this
     */
    public function setParams(array $params)
    {
        foreach ($params as $name => $value) {
            $this->add($name, $value);
        }
        return $this;
    }

    /**
     * AbstractMethod constructor.
     *
     * @param string $method
     * @param AbstractClient $client
     */
    public function __construct($method, $client)
    {
        $this->method = $method;
        $this->client = $client;
        $input = [];
        $flags = 0;
        $iterator_class = "ArrayIterator";
        parent::__construct($input, $flags, $iterator_class);
    }
}