<?php


namespace carono\docdoc;


abstract class AbstractMethod extends \ArrayObject
{
    public function toArray()
    {

    }

    public function add($name, $value)
    {
//        $this->a
    }

    public function setParams($params)
    {
        foreach ($params as $name => $value) {
            $this->add($name, $value);
        }
    }

    /**
     * AbstractMethod constructor.
     *
     * @param string $method
     * @param AbstractClient $client
     */
    public function __construct($method, $client)
    {
        $input = [];
        $flags = 0;
        $iterator_class = "ArrayIterator";
        parent::__construct($input, $flags, $iterator_class);
    }
}