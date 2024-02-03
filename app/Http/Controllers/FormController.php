<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailService;
use PHPMailer\PHPMailer\PHPMailer;
use Mail;
use App\Mail\RequestMail;

use App\Events\OrderArrived;
use App\Events\CallbackRequested;

class FormController extends Controller
{
    public function call(Request $request) {
        CallbackRequested::dispatch($request->post());

        return json_encode([
            "status" => "success",
            "message" => "Ваша заявка принята",
        ]);
    }
}
