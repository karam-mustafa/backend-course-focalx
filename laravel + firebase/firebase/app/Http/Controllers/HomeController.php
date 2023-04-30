<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Kutia\Larafirebase\Facades\Larafirebase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function fcmToken(Request $request){
        $request->user()->update([
            'fcm_token' => $request->token,
        ]);
        return response()->json([
            'message' => 'fcm token has been updated',
        ]);
    }

    public function sendNotification(Request $request){
        try {
            $tokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
            Larafirebase::withTitle($request->title)
                ->withBody($request->message)
                ->sendMessage($tokens);
            return response()->json([
                'message' => 'sent!'
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
}
