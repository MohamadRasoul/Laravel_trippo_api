<?php

namespace App\Events;

use App\Enums\ModelEnum;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class showModel
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(
        public $modal,
        public ModelEnum $modelType
    ) {}

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
