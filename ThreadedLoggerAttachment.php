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

abstract class ThreadedLoggerAttachment extends \Threaded implements \LoggerAttachment
{

    /** @var \ThreadedLoggerAttachment */
    protected $attachment = null;

    /**
     * @param mixed $level
     * @param string $message
     */
    public final function call($level, $message)
    {
        $this->log($level, $message);
        if ($this->attachment instanceof \ThreadedLoggerAttachment) {
            $this->attachment->call($level, $message);
        }
    }

    /**
     * @param ThreadedLoggerAttachment $attachment
     */
    public function removeAttachment(\ThreadedLoggerAttachment $attachment)
    {
        if ($this->attachment instanceof \ThreadedLoggerAttachment) {
            if ($this->attachment === $attachment) {
                $this->attachment = null;
                foreach ($attachment->getAttachments() as $attachment) {
                    $this->addAttachment($attachment);
                }
            }
        }
    }

    /**
     * @return \ThreadedLoggerAttachment[]
     */
    public function getAttachments()
    {
        $attachments = [];
        if ($this->attachment instanceof \ThreadedLoggerAttachment) {
            $attachments[] = $this->attachment;
            $attachments += $this->attachment->getAttachments();
        }

        return $attachments;
    }

    /**
     * @param ThreadedLoggerAttachment $attachment
     */
    public function addAttachment(\ThreadedLoggerAttachment $attachment)
    {
        if ($this->attachment instanceof \ThreadedLoggerAttachment) {
            $this->attachment->addAttachment($attachment);
        } else {
            $this->attachment = $attachment;
        }
    }

    public function removeAttachments()
    {
        if ($this->attachment instanceof \ThreadedLoggerAttachment) {
            $this->attachment->removeAttachments();
            $this->attachment = null;
        }
    }
}