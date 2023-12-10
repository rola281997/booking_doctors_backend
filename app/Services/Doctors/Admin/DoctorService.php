<?php 

namespace App\Services\Doctors\Admin;

use App\Enums\DoctorWorkingDayTypesEnum;
use App\GlobalVariables\SplitTimeDuration;
use App\GlobalVariables\WorkingDaysType;
use App\Helpers\UploadFileHepler;
use App\Repositories\Doctors\DoctorRepository;
use App\Repositories\Doctors\DoctorWorkingDayRepository;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class DoctorService
{
    use UploadFileHepler;
    protected $doctorRepository,$baseService;
    public function __construct(DoctorRepository $doctorRepository,BaseService $baseService){
        $this->doctorRepository = $doctorRepository;
        $this->baseService = $baseService;
    }
   
    public function create(array $request):?object{

        if(isset($request['photo'])){
            $request['photo']=$this->uploadPhoto($request['photo'],$this->doctorRepository);
        }
        $doctorData=$this->handleDoctorData($request);
        $doctor=$this->doctorRepository->create($doctorData);
        if(isset($request['services'])){
            $this->saveDoctorSerivces($doctor,$request['services']);
        }
        if(isset($request['working_days'])){
            $this->saveDoctorWorkingDays($doctor,$request['working_days']);
        }
        return $doctor->refresh();
    }
   
    private function handleDoctorData(array $request):array{
        $doctorData=[];
        if(isset($request['name'])){
            $doctorData['name']=$request['name'];
        }
        if(isset($request['mobile'])){
            $doctorData['mobile']=$request['mobile'];
        }
        if(isset($request['password'])){
            $doctorData['password']=Hash::make($request['password']);
        }
        if(isset($request['email'])){
            $doctorData['email']=$request['email'];
        }
        if(isset($request['photo'])){
            $doctorData['photo']=$request['photo'];
        }
        return $doctorData;
    }
    private function saveDoctorSerivces(object $doctor,array $services):void{
        $this->doctorRepository->syncService($doctor,$services);
    }
    
    private function saveDoctorWorkingDays(object $doctor,array $workingDays):void{
        $doctorWorkingDayRepository=App::make(DoctorWorkingDayRepository::class);
        foreach($workingDays as $day){
            $day=(object)$day;
            if(!$doctorWorkingDayRepository->findWhere(['work_day'=>$day->work_day,'doctor_id'=>$doctor->id])->first()){
                $doctorWorkingDayRepository->create(['work_day'=>$day->work_day,'doctor_id'=>$doctor->id,'start_time'=>$day->start_time,'end_time'=>$day->end_time]);
            }
        }
    }
   
}
