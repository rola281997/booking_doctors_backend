<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doctor_id',
        'pateint_id',
        'service_id',
        'booking_date_time',
    ];
    public function doctor():BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    public function patient():BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    public function service():BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
