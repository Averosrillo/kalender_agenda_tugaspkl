<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end','nama_ruang','baju']);
  
             return response()->json($data);
        }
  
        return view('welcome');
    }
 
    public function manageEvent(Request $request)
    {
 
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'nama_ruang'=>$request->nama_ruang,
                    'baju'=>$request->baju,
                ]);
    
                return response()->json($event);
                break;
    
            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'nama_ruang'=>$request->nama_ruang,
                    'baju'=>$request->baju,
                ]);
    
                return response()->json($event);
                break;
    
            case 'delete':
                $event = Event::find($request->id)->delete();
    
                return response()->json($event);
                break;
                
            default:
                
                break;
        }
    }

    public function search(Request $request)
    {
        $query = Event::query();

        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        if ($request->filled('start_date')) {
            $query->whereDate('start', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('end', '<=', $request->end_date);
        }

        if ($request->filled('nama_ruang')) {
            $query->where('nama_ruang', 'LIKE', '%' . $request->nama_ruang . '%');
        }

        if ($request->filled('baju')) {
            $query->where('baju', 'LIKE', '%' . $request->baju . '%');
        }
        $events = $query->get();

        return view('search', compact('events'));
    }

    public function contact()
    {
        return view('kontak');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
    
    
}