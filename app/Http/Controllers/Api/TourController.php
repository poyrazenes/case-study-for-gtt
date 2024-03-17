<?php

namespace App\Http\Controllers\Api;

use App\Models\Tour;

class TourController extends ApiBaseController
{
    public function index()
    {
        return $this->response->setData(Tour::all())->respond();
    }

    public function store(TourRequest $request)
    {

    }

    public function update(TourRequest $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
