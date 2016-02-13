<?php

namespace App\Http\Controllers;
use App\Http\Requests\SubscriberRequest;
use App\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class SubscribersController extends Controller
{
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
    public function store(SubscriberRequest $request)
    { Log::info("ghhgh");
        $validator = Validator::make($request->all(),$request->rules());
        Log::info($validator->getMessageBag()->toArray());
        if ($validator->fails()) {
//            return Redirect::back()
//                ->withErrors($validator)
//                ->withInput();
            return Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        DB::beginTransaction();
        try {
            $subscriber = Subscriber::create(['email' => $request->get('email')]);
            $subscriber->save();
            Session::put('isSubscribed', 'true');
            DB::commit();
        }catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
        Flash::overlay('Glad to have you as a new member! ');
        return Response::json(['message' => 'Success', 'message_class' => 'alert alert-success fade in']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
