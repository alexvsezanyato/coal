<?php

namespace App\Services;

class MailService {
    private $subject= "";
    private $message = "";
    private $recipient = "";
    private $headers = [];

    private $login;
    private $password;

    public function withRecipient(string $recipient): self {
        $this->recipient = $recipient;
        return $this;
    }

    public function withSubject(string $subject): self {
        $this->subject = $subject;
        return $this;
    }

    public function withMessage(string $message): self {
        $this->message = $message;
        return $this;
    }

    public function withHeaders(array $headers) {
        $this->headers = $headers;
        return $this;
    }

    public function send() {
        return mail(
            $this->recipient,
            $this->subject,
            $this->message,
            $this->headers
        );
    }
}
