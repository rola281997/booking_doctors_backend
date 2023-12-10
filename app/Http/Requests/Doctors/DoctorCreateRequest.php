<?php

namespace App\Http\Requests\Doctors;

use App\Enums\DoctorWorkingDayTypesEnum;
use App\GlobalVariables\WorkingDaysType;
use App\Helpers\ResponseHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DoctorCreateRequest extends FormRequest
{
    use ResponseHelper;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:150',
            'mobile' => 'required|min:3|max:150|unique:doctors,mobile',
            'email' => 'required',
            'services'=>'required|array',
            'services.*'=>'required|exists:services,id',
            'working_days' => 'required|array',
            'working_days.*.work_day' => 'required|in:'.implode(',',WorkingDaysType::WEEKDAYSVALUES).'',
            'working_days.*.start_time' => 'required|date_format:H:i:s',
            'working_days.*.end_time' => 'required|date_format:H:i:s|after:working_days.*.start_time',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif'
        ];
    }

}
