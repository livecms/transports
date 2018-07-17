<?php

namespace LiveCMS\Transport;

class JavascriptTransport
{
    protected static $javascript;

    public function set($javascript = null)
    {
        static::$javascript = $javascript;
    }

    public function append($javascript)
    {
        if (strpos(static::$javascript, $javascript) === false) {
            static::$javascript .= "\r\n".$javascript;
        }
        return $this;
    }

    public function get()
    {
        return static::$javascript;
    }

    public function flush()
    {
        $this->set();
    }
}
