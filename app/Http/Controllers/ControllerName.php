<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelName;

class ControllerName extends Controller
{
    public function functionName(Request $request)
    {
        $record = new ModelName;
        $record->column_name = 'value';
        $record->save();
    }
}
