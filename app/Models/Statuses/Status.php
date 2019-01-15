<?php

namespace App\Models\Statuses;

use App\Models\Cards\Card;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * @var string
     */
    protected $table = 'statuses';

    /**
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}