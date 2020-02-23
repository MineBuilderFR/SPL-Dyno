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
 * @copyright (c) 2020
 * @author Y&SS-YassLV
 */

interface Logger
{

    /**
     * System is unusable
     *
     * @param string $message
     */
    public function emergency($message);

    /**
     * Action must me taken immediately
     *
     * @param string $message
     */
    public function alert($message);

    /**
     * Critical conditions
     *
     * @param string $message
     */
    public function critical($message);

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     */
    public function error($message);

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     */
    public function warning($message);

    /**
     * Normal but significant events.
     *
     * @param string $message
     */
    public function notice($message);

    /**
     * Inersting events.
     *
     * @param string $message
     */
    public function info($message);

    /**
     * Detailed debug information.
     *
     * @param string $message
     */
    public function debug($message);

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     */
    public function log($level, $message);

    /**
     * Logs a Throwable object
     *
     * @param Throwable $e
     * @param $trace
     */
    public function logException(\Throwable $e, $trace = null);
}