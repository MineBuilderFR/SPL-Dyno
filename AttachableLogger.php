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

interface AttachableLogger extends \Logger
{

    /**
     * @param LoggerAttachment $attachment
     */
    public function addAttachment(\LoggerAttachment $attachment);

    /**
     * @param LoggerAttachment $attachment
     */
    public function removeAttachment(\LoggerAttachment $attachment);

    public function removeAttachments();

    /**
     * @return \LoggerAttachment[]
     */
    public function getAttachments();
}