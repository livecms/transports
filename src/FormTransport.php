<?php

namespace LiveCMS\Transport;

class FormTransport
{
    const DEFAULT = 'default';

    protected static $form = [];

    public function set($form = null, $name = null)
    {
        $name = $name ?: static::DEFAULT;
        static::$form[$name] = $form;
    }

    public function append($form, $name = null)
    {
        $name = $name ?: static::DEFAULT;
        if (!isset(static::$form[$name])) {
            static::$form[$name] = '';
        }
        static::$form[$name] .= "\r\n".$form;
        return $this;
    }

    public function get($name = null)
    {
        $name = $name ?: static::DEFAULT;
        return static::$form[$name] ?? null;
    }

    public function flush()
    {
        $this->set();
    }
}
