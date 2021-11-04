<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function responseType($data = [], $template = 'welcome', $back = false, $status = 200)
    {
        if (\Request::wantsJson()) return response()->json($data, $status);
        if ($back == true) return redirect()->back();
        return view($template, $data);
    }
}
