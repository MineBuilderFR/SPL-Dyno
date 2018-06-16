<?php

/**
 * ________
 * ___  __ \____  ______________
 * __  / / /_  / / /_  __ \  __ \
 * _  /_/ /_  /_/ /_  / / / /_/ /
 * /_____/ _\__, / /_/ /_/\____/
 *         /____/
 *
 * This program is free: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is based on PocketMine Software and Synapse.
 *
 * @copyright (c) 2018
 * @author Y&SS-MineBuilderFR
 */

class SplFixedByteArray extends SplFixedArray
{

    private $convert;

    public function __construct($size, $convert = false)
    {
        parent::__construct($size);
        $this->convert = (bool)$convert;
    }

    /**
     * @param string $str
     * @param bool $convert
     *
     * @return SplFixedByteArray
     */
    public static function fromString($str, $convert = false)
    {
        $len = strlen($str);
        $ob = new SplFixedByteArray($len, $convert);

        if ($convert) {
            for ($i = 0; $i < $len; ++$i) {
                $ob[$i] = ord($str{$i});
            }
        } else {
            for ($i = 0; $i < $len; ++$i) {
                $ob[$i] = $str{$i};
            }
        }

        return $ob;
    }

    /**
     * @param string $str
     * @param int $size
     * @param int $start
     * @param bool $convert
     *
     * @return SplFixedByteArray
     */
    public static function fromStringChunk($str, $size, $start = 0, $convert = false)
    {
        $ob = new SplFixedByteArray($size, $convert);

        if ($convert) {
            for ($i = 0; $i < $size; ++$i) {
                $ob[$i] = ord($str{$i + $start});
            }
        } else {
            for ($i = 0; $i < $size; ++$i) {
                $ob[$i] = $str{$i + $start};
            }
        }

        return $ob;
    }

    public function chunk($start, $size, $normalize = true)
    {
        $end = $start + $size;
        if ($normalize and $this->convert) {
            $d = "";
            for ($i = $start; $i < $end; ++$i) {
                $d .= chr($this[$i]);
            }
        } else {
            $d = [];
            for ($i = $start; $i < $end; ++$i) {
                $d[] = $this[$i];
            }
        }
        return $d;
    }

    public function __toString()
    {
        return $this->toString();
    }

    public function toString()
    {
        $result = "";
        if ($this->convert) {
            for ($i = 0; $i < $this->getSize(); ++$i) {
                $result .= chr($this[$i]);
            }
        } else {
            for ($i = 0; $i < $this->getSize(); ++$i) {
                $result .= $this[$i];
            }
        }
        return $result;
    }
}