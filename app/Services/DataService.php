<?php

namespace App\Services;

use Illuminate\Http\Request;

class DataService
{
    public function getDataList(Request $request)
    {
        $search_code = $request->input('search_code', 0);
        $event_code  = $request->input('event_code', 0);

        $data_list = [$search_code, $event_code];

        return $data_list;
    }
}
