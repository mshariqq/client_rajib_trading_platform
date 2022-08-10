<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// usInstruments model
use App\Instrument;

class InstrumentsController extends Controller
{
    // CRUD methods for admin
    public function index()
    {
        // create array with $data and add page_title and instruments and pass that array to view
        $data['page_title'] = 'Manage Instruments';
        $data['instruments'] = Instrument::latest()->paginate(25);
        return view('admin.instruments.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Add New Instruments';
        return view('admin.instruments.create', $data);
    }

    public function store(Request $request)
    {
        $instrument = new Instrument();
        $instrument->name = $request->name;
        // status
        $instrument->status = $request->status;
        $instrument->save();
        // if success, then redirect with success or error
        if ($instrument->save()) {
            return redirect()->route('instruments')->with('success', 'Instrument created successfully');
        } else {
            return redirect()->route('instruments')->with('error', 'Something went wrong');
        }
    }

    public function show($id)
    {
        $instrument = Instrument::find($id);
        return view('instruments.show', compact('instrument'));
    }

    public function edit($id)
    {
        // find the instrument with id and pass it to view with page_title
        $instrument = Instrument::find($id);
        $data['page_title'] = 'Edit Instrument';
        $data['instrument'] = $instrument;
        return view('admin.instruments.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $instrument = Instrument::find($id);
        $instrument->name = $request->name;
        $instrument->status = $request->status;
        $instrument->save();
        // if success, then redirect with success or error
        if ($instrument->save()) {
            return redirect()->route('instruments')->with('success', 'Instrument updated successfully');
        } else {
            return redirect()->route('instruments')->with('error', 'Something went wrong');
        }
    }

    public function destroy($id)
    {
        $instrument = Instrument::find($id);
        $instrument->delete();
        return redirect('/instruments');
    }


}
