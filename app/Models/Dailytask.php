<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dailytask extends Model
{
    protected $guarded = [];

    public function listpic() : BelongsTo {
        return $this->belongsTo(Taskuser::class);
    }

        public function listclient() : BelongsTo {
        return $this->belongsTo(Taskuser::class);
    }

        public function activitylog() : HasOne {
            return $this->hasOne(ActivityLog::class);
        }
}
