<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Create a new EventController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'begin' => 'required|date',
            'end' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $event = new Event(
            array_merge(
                $validator->validated(),
                ['user_id' => auth('api')->user()->id]
            )
        );

        if ($event->save()) {
            return response()->json([
                'message' => 'Event successfully created',
                'event' => $event
            ], 201);
        }

        return response()->json([
            'message' => 'An error has ocurred',
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param  integer  $month
     * @param  integer  $year
     * @return \Illuminate\Http\Response
     */
    public function filter($month, $year)
    {
        $events = Event::select(['id', 'title', 'description', 'begin', 'end'])
            ->where('user_id', auth('api')->user()->id)
            ->where(function ($query) use ($year, $month) {
                $query->where(function ($query) use ($year, $month) {
                    $query->whereMonth('begin', '<=', $month);
                    $query->whereYear('begin', $year);
                });
                $query->where(function ($query) use ($year, $month) {
                    $query->whereMonth('end', '>=', $month);
                    $query->whereYear('end', $year);
                });
                $query->orWhere(function ($query) use ($year, $month) {
                    $query->whereMonth('end', '=', $month);
                    $query->whereYear('end', $year);
                });
                $query->orWhere(function ($query) use ($year, $month) {
                    $query->whereMonth('begin', '=', $month);
                    $query->whereYear('begin', $year);
                });
                $query->orWhere(function ($query) use ($year, $month) {
                    $query->where('begin', '<=', "$year-$month-01");
                    $query->where('end', '>=', "$year-$month-01");
                });
            })
            ->orderBy('begin')
            ->get();

        return response()->json([
            'events' => $events
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'begin' => 'required|date',
            'end' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $event = Event::find($id);

        if (auth('api')->user()->id != $event->user_id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $event->fill(array_merge(
            $validator->validated(),
            ['user_id' => auth('api')->user()->id]
        ));

        if ($event->save()) {
            return response()->json([
                'message' => 'Event successfully updated',
                'event' => $event
            ], 201);
        }

        return response()->json([
            'message' => 'An error has ocurred',
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Event::find($id)->delete()) {
            return response()->json([
                'message' => 'Event successfully deleted',
            ], 200);
        }
    }
}
