<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe($email) {

        return $this->client()->lists->addListMember(config('services.mailchimp.list.subscribers'), [
            'email_address' => $email,
            "status" => "subscribed"
        ]);
    }

    protected function client(): ApiClient
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us20'
        ]);
    }
}
