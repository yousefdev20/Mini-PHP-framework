<?php

namespace Yousef\Orm\app\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response(array|Object|bool|null $data = [], string $message = null, int $code = 200): \Illuminate\Http\JsonResponse
    {
        return Response::json(['data' => $data, 'message' => $message], $code);
    }
}
