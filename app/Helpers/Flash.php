<?php

namespace App\Helpers;

class Flash
{
    /*public function success($message)
    {
        $this->setFlash($message);
    }

    public function error($message)
    {
        $this->setFlash($message, 'error');
    }

    public function warn($message)
    {
        $this->setFlash($message, 'warn');
    }

    public function info($message)
    {
        $this->setFlash($message, 'info');
    }*/

    public function __call($type, $message)
    {
        $this->setFlash( array_get($message, '0'), $type);
    }

    /**
     * @param $message
     */
    protected function setFlash($message, $type='success')
    {
        session()->flash('notify', [
            'message' => $message,
            'type' => $type
        ]);
    }
}