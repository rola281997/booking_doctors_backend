<?php
namespace App\Enums;


enum BookingStatusesEnum:string
{
    case PENDINGSTATUS = 'pending';
    case ACCEPTSTATUS = 'accept';
    case REJECTSTATUS = 'reject';
}