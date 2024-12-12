<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details',compact('room'));
    }

    public function book_room(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'bail|required|min:4|max:100',
            'startDate' => 'required|date',
            'endDate'=> 'date|after:startDate',
        ]);
        $data= new Booking();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id',$id)->where('start_date','<=',$endDate)->where('end_date','>=',$startDate)->exists();

        if($isBooked){
            return redirect()->back()->with('message','Room is already booked. Please try another room.');
        }
        else
        {
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;

            $data->save();
            return redirect()->back()->with('message','Room Booked Successfully');
        }
    }

    public function contact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return redirect()->back()->with('message','Message Sent Successfully');
    }

    public function about_page()
    {
        return view('home.about_page');
    }

    public function room_page()
    {
        $room = Room::all();

        return view('home.room_page',compact('room'));
    }

    public function gallery_page()
    {
        $gallery = Gallery::all();

        return view('home.gallery_page',compact('gallery'));
    }

    public function contact_page()
    {
//        $contact = Contact::all();

        return view('home.contact_page');
    }
}
