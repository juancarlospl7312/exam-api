<?php

namespace App\Services;

use App\Models\Subscriber;

class SubscriberService
{
    public function subscribe(array $data): Subscriber
    {
        $status = $this->determineStatus($data['email']);

        return Subscriber::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $status
        ]);
    }

    private function determineStatus(string $email): bool
    {
        return str_ends_with($email, '@gmail.com');
    }
}
