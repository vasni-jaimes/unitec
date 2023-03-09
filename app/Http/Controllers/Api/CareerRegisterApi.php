<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use Validator;


class CareerRegisterApi extends Controller
{
    public function __invoke( $education_id )
    {
        $validator = $this->validationRequest( $education_id );
        if ( $validator->fails() ) {
            return response()->json(['message' => 'error_request', 
                                     'errors'  => $validator->errors()], 
                                     200);
        }

        $career = Career::select('name','id')
                        ->where('educational_level_id', $education_id)
                        ->get();
        
        if ( $career->count() <= 0 ) {
            return response()->json(['message' => 'no_results'], 200);
        }

        return response()->json(['message' => 'ok', 'results' => $career], 200);
    }

    public function validationRequest( $education_id ) 
    {
        return Validator::make(['education_id' => $education_id], $this->rules());
    }

    public function rules()
    {
        return [
            'education_id' => 'required|numeric|digits_between:1,3'
        ];
    }
}
