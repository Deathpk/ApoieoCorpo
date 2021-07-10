<?php

namespace App\Events;

use App\Models\PasswordResetModel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class PasswordChangeRequested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $token;
    private $userEmail;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PasswordResetModel $resetInfo)
    {
        $this->userEmail = $resetInfo->email;
        $this->token = $resetInfo->token;
    }

    public function getData(): Collection
    {
        $resetInfo = collect();
        $resetInfo->email = $this->userEmail;
        $resetInfo->token = $this->token;

        return $resetInfo;
    }
}
