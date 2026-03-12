<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Services\SubscriberService;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    private $subscriberService;

    public function __construct(SubscriberService $subscriberService)
    {
        $this->subscriberService = $subscriberService;
    }

    public function subscribe(SubscribeRequest $request)
    {
        $subscriber = $this->subscriberService
            ->subscribe($request->validated());

        return response()->json([
            'message' => 'Subscriber created successfully',
            'data' => $subscriber
        ], 201);
    }
}
