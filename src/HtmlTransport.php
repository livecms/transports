<?php

namespace LiveCMS\Transport;

class HtmlTransport
{
    const DEFAULT = 'default';

    protected static $html = [];

    public function set($html = null, $name = null)
    {
        $name = $name ?: static::DEFAULT;
        static::$html[$name] = $html;
    }

    public function append($html, $name = null)
    {
        $name = $name ?: static::DEFAULT;
        if (!isset(static::$html[$name])) {
            static::$html[$name] = '';
        }
        static::$html[$name] .= "\r\n".$html;
        return $this;
    }

    public function get($name = null)
    {
        $name = $name ?: static::DEFAULT;
        return static::$html[$name] ?? null;
    }

    public function pull($name = null)
    {
        $html = $this->get($name);
        $this->flush($name);
        return $html;
    }

    public function flush($name)
    {
        $this->set(null, $name);
        return $this;
    }

    public function flushAll()
    {
        static::$html = [];
        return $this;
    }
}
