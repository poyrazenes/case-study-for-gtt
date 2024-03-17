<?php

namespace App\Http\Controllers\Api;

use App\Models\Tour;

use App\Http\Requests\Api\TourRequest;
use App\Http\Resources\Api\TourResource;

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
            ->setData(TourResource::collection($rows))
            ->setMeta($meta)
            ->respond();
    }

    public function store(TourRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Tour::create($data);

        return $this->response
            ->setCode(201)
            ->setStatus(true)
            ->setMessage('Operation was successful!')
            ->respond();
    }

    public function update(TourRequest $request, $id)
    {
        $data = $request->validated();

        $row = Tour::find($id);

        if (!$row) {
            return $this->response
                ->setCode(404)
                ->setStatus(false)
                ->setMessage('Not Found!')
                ->respond();
        }

        $row->update($data);

        return $this->response
            ->setCode(204)
            ->setStatus(true)
            ->setMessage('Operation was successful!')
            ->respond();
    }

    public function destroy($id)
    {
        $row = Tour::find($id);

        if (!$row) {
            return $this->response
                ->setCode(404)
                ->setStatus(false)
                ->setMessage('Not Found!')
                ->respond();
        }

        $row->delete();

        return $this->response
            ->setCode(204)
            ->setStatus(true)
            ->setMessage('Operation was successful!')
            ->respond();
    }
}
