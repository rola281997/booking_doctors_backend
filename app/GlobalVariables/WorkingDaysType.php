<?php
namespace App\GlobalVariables;

use App\Enums\DoctorWorkingDayTypesEnum;

class WorkingDaysType
{
    const WEEKDAYSVALUES=[DoctorWorkingDayTypesEnum::SATURDAY['value'], DoctorWorkingDayTypesEnum::SUNDAY['value'], DoctorWorkingDayTypesEnum::MONDAY['value'],DoctorWorkingDayTypesEnum::TUESDAY['value'],DoctorWorkingDayTypesEnum::WEDNESDAY['value'],DoctorWorkingDayTypesEnum::THURSDAY['value'],DoctorWorkingDayTypesEnum::FRIDAY['value']];
    const WEEKDAYS=[DoctorWorkingDayTypesEnum::SATURDAY, DoctorWorkingDayTypesEnum::SUNDAY, DoctorWorkingDayTypesEnum::MONDAY,DoctorWorkingDayTypesEnum::TUESDAY,DoctorWorkingDayTypesEnum::WEDNESDAY,DoctorWorkingDayTypesEnum::THURSDAY,DoctorWorkingDayTypesEnum::FRIDAY];
}