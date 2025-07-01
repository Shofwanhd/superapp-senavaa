<?php

namespace App\Models;

use App\Models\User;
use App\Models\Clientlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Taskuser extends Model
{
  	protected $guarded = [];
  
    public function ListUser() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
  
  	public function Listoffice() : BelongsTo{
      	return $this->belongsTo(Clientlist::class, 'office','kode');
    }
}
