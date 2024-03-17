<?php

namespace App\Http\Controllers\Api;

use App\Support\Response\Response;

use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{
    /**
     * JsonResponse object to return data...
     *
     * @var $response null
     */
    protected $response = null;


    public function __construct()
    {
        $this->middleware('api');
        $this->response = new Response();
    }
}
