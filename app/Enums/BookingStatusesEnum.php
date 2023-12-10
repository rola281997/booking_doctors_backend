<?php
namespace App\Enums;

enum BookingStatusesEnum:string
{
    const  PENDINGSTATUS = 'pending';
    const ACCEPTSTATUS = 'accept';
    const REJECTSTATUS = 'reject';
}