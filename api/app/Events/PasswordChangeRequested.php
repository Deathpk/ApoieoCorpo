<?php

namespace App\Events;

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

    private $oldPassword;
    private $userEmail;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $oldPassword, string $userEmail)
    {
        $this->oldPassword = $oldPassword;
        $this->userEmail = $userEmail;
    }

    public function getData(): Collection
    {
        $resetInfo = collect();
        $resetInfo->email = $this->userEmail;
        $resetInfo->oldPassword = $this->oldPassword;

        return $resetInfo;
    }
}
