<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\TourListCollection;
use App\Models\Tour;

class TourController extends ApiBaseController
{
    public function index()
    {
        $take = 20;

        $rows = Tour::paginate($take);

        $meta = [
            'page' => (int)request()->input('page', 1),
            'total' => $rows->total(),
            'page_count' => (int)ceil($rows->total() / $take),
        ];

        return $this->response->setCode(200)
            ->setStatus(true)
            ->setMessage('Operation was successful!')
            ->setData(TourListCollection::collection($rows))
            ->setMeta($meta)
            ->respond();
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
