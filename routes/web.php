<?php

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/email', function () {

    Mail::raw('Mensagem de teste de envio de email', function (Message $message) {
        $message->to('teste@gmail.com')
            ->subject("Bem-Vindo ao RH MANGNT")
            ->from('rh@rhmangnt.com');
    });

    echo "Emai enviado com sucesso!";
});
