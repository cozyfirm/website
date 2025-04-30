<?php

namespace App\Traits\Common;

use App\Models\Core\File;
use App\Models\Other\Visits\Visit;
use Illuminate\Http\Request;

trait VisitorTrait{
    public function updateVisitor($type, $model_id = null): void{
        if($model_id){
            $data = Visit::where('date', '=', date('Y-m-d'))->where('type', '=', $type)->where('model_id', '=', $model_id)->first();

            if(!$data){
                Visit::create(['type' => $type, 'model_id' => $model_id, 'date' => date('Y-m-d')]);
            }else{
                $data->update(['views' => $data->views + 1]);
            }
        }else{
            $data = Visit::where('date', '=', date('Y-m-d'))->where('type', '=', $type)->first();

            if(!$data){
                Visit::create(['type' => $type, 'date' => date('Y-m-d')]);
            }else{
                $data->update(['views' => $data->views + 1]);
            }
        }
    }
}
