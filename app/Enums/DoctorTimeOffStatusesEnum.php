<?php
namespace App\Enums;


enum DoctorTimeOffStatusesEnum:string
{
    case PENDINGSTATUS = 'pending';
    case ACCEPTSTATUS = 'accept';
    case REJECTSTATUS = 'reject';
}