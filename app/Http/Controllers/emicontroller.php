<?php

namespace App\Http\Controllers;

use App\Models\emi;
use App\Models\month;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class emicontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getEmi(request $request)
    {
        if(!empty($request->searchId)){
            // find id
            $findId = emi::where(['id'=> $request->searchId])->first();
            // get duration
            $getDuration = month::where('id','<=', $findId->duration_id)->get();

            $amount= $findId->amount; $interest= $findId->interest; $duration= $findId->duration;

            $emiData = [
                '<thead>
                    <tr class="bg-dark">
                        <th>selected Amount<br><b class="text-primary"><i class="fa fa-inr" aria-hidden="true"></i>'.$amount.'</b></th>
                        <th>Interest<br><b class="text-primary">'.$interest.'%</b></th>
                        <th>Duration<br><b class="text-primary">'.$duration.'m</b> </th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Installment</th>
                        <th>Duration</th>
                        <th>Interest </th>
                        <th>Total Cost</th>
                    </tr>
                </thead>'
            ];
            foreach($getDuration as $aa){
                $rateIntereset= $interest;
                $int= $interest/1200;
                $calculatemi= $amount * $int * (pow((1+$int),$aa->month) / (pow((1+$int),$aa->month)-1));
                $emi= round($calculatemi);
                $totalCost = $emi*$aa->month;

                $emiData[] =  [
                    '
                    <tbody>
                    <tr>
                        <td><i class="fa fa-inr" aria-hidden="true"></i>'.$emi.'</td>
                        <td>'.$aa->month.'m</td>
                        <td>'.$rateIntereset.'%</td>
                        <td><i class="fa fa-inr" aria-hidden="true"></i>'.$totalCost.'</td>
                    </tr>
                    </tbody>
                    '
                ];

            }
            // response the result
            return json_encode($emiData) ;
        }

        $validator = Validator::make($request->all(),[
            'amount'=> 'required',
            'interest'=> 'required',
            'duration' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['error'=> $validator->errors()]);
        }
        $amount= $request->amount; $interest= $request->interest; $duration= $request->duration;

        // model method
        $selectedDuration = month::where('month', $duration)->first();
        $getDuration = month::where('id','<=', $selectedDuration->id)->get();

        // insert data using DB method
        DB::table('emis')->insert([
            'amount' => $amount,
            'interest'=> $interest,
            'duration'=> $duration,
            'duration_id'=> $selectedDuration->id
        ]);

        $emiData = [];
        foreach($getDuration as $aa){
            $rateIntereset= $interest;
            $int= $interest/1200;
            $calculatemi= $amount * $int * (pow((1+$int),$aa->month) / (pow((1+$int),$aa->month)-1));
            $emi= round($calculatemi);
            $totalInterest = ($emi*$aa->month) - $amount;
            $totalCost = $emi*$aa->month;

            $emiData[] =  [
                '
                <tr>
                    <td><i class="fa fa-inr" aria-hidden="true"></i>'.$emi.'</td>
                    <td>'.$aa->month.'m</td>
                    <td>'.$rateIntereset.'%</td>
                    <td><i class="fa fa-inr" aria-hidden="true"></i>'.$totalCost.'</td>
                </tr>
                '
            ];
        }
        // response the result
        return json_encode($emiData) ;
    }

    public function getHistory(){
        $histories = emi::orderBy('id', 'desc')->simplePaginate(10);
        return view('emi.history', compact('histories'));
    }

}
