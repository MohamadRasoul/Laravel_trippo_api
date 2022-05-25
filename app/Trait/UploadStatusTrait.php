<?php

namespace App\Trait;



trait UploadStatusTrait
{
    public function scopeRequested($query)
    {
        return $query->where('upload_status', 0);
    }

    public function scopeAccepted($query)
    {
        return $query->where('upload_status', 1);
    }

    public function scopeRejected($query)
    {
        return $query->where('upload_status', 2);
    }
}
