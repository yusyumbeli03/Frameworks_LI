<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $room = Room::all();
                $gallery = Gallery::all();
                return view('home.index', compact('room','gallery'));
            } else if ($usertype == 'admin') {
                $roomCount = Room::count();
                $bookingCount = Booking::count();
                $contactCount = Contact::count();
                $galleryCount = Gallery::count();
                return view('admin.index',compact('roomCount','bookingCount','contactCount','galleryCount'));
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $room = Room::all();
        $gallery = Gallery::all();
        return view('home.index', compact('room', 'gallery'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $data = new Room();
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        return redirect()->back();
    }

    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }

    public function room_delete($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function room_update($id)
    {
        $data = Room::find($id);
        return view('admin.update_room', compact('data'));
    }

    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back();
    }

    public function bookings()
    {
        $data = Booking::all();
        return view('admin.booking', compact('data'));
    }

    public function booking_delete($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function approve_book($id)
    {
        $booking = Booking::find($id);
        $booking->status ='Approved';
        $booking->save();
        return redirect()->back();
    }

    public function rejected_book($id)
    {
        $booking = Booking::find($id);
        $booking->status ='Rejected';
        $booking->save();
        return redirect()->back();
    }

    public function view_gallery()
    {
        $gallery = Gallery::all();
         return view ('admin.gallery',compact('gallery'));
    }

    public function upload_gallery(Request $request)
    {
        $data = new Gallery();
        $image = $request->image;
        if($image)
        {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('gallery', $imagename);
            $data->image = $imagename;

        }

        $data->save();
        return redirect()->back();
    }

    public function gallery_delete($id)
    {
        $data = Gallery::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function view_messages()
    {
        $contact = Contact::all();
        return view ('admin.message',compact('contact'));
    }

    public function send_mail($id)
    {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }

    public function mail(Request $request,$id)
    {
//        dd($request->all());
        $data = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_line' => $request->end_line,
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back();
    }

    public function  room_search(Request $request)
    {
        $search = $request->search;
        $data = Room::where('room_title','like','%'.$search.'%')->get();
        return view('admin.view_room',compact('data'));
    }
}
