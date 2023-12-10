<?php
namespace App\Enums;


enum DoctorTimeOffStatusesEnum:string
{
    const PENDINGSTATUS = 'pending';
    const ACCEPTSTATUS = 'accept';
    const REJECTSTATUS = 'reject';
}