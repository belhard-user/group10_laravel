<?php

function flash($message = null)
{
    $flash = new \App\Helpers\Flash();

    if(is_null($message)){
        return $flash;
    }

    return $flash->success($message);
}

// flash('message')
// flash()->error('asdasdasd')
// flash()->warn('asdasdasd')
// flash()->info('asdasdasd')
// flash()->success('asdasdasd')