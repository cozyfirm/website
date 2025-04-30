<?php

namespace App\Traits\Common;

use App\Models\Core\File;
use App\Models\Other\API\APICalls;
use App\Models\Other\Visits\Visit;
use Illuminate\Http\Request;

trait APITrait{
    public function updateAPI($api_id, $type, $status, $response = null): void{
        try{
            APICalls::create([
                'api_id' => $api_id,
                'type' => $type,
                'status' => $status,
                'response' => $response
            ]);
        }catch (\Exception $e){

        }
    }
}
