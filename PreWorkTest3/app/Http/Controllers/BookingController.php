<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->simplePaginate(5);
        return view('dashboard', compact('bookings'));
    }
    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'arrival_date' => 'required'
        ]);
        $booking = new Booking();
        $booking->arrival_date = $request->arrival_date;
        $booking->user_id = auth()->user()->id;
        $booking->status = false;
        $booking->save();
        return redirect('/dashboard');
    }

    public function edit(Booking $booking)
    {

        if (auth()->user()->id == $booking->user_id)
        {
            return view('edit', compact('booking'));
        }
        else {
            return redirect('/dashboard');
        }
    }

    public function update(Request $request, Booking $booking)
    {
        if(isset($_POST['delete'])) {
            $booking->delete();
            return redirect('/dashboard');
        }
        else
        {
            $this->validate($request, [
                'arrival_date' => 'required'
            ]);
            $booking->arrival_date = $request->arrival_date;
            $booking->save();
            return redirect('/dashboard');
        }
    }
}
