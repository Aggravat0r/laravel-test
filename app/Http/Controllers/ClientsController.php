<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index', ['clients' => Client::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|unique:clients|max:255',
            'city' => 'required|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email|max:255'
        ]);

        $client = new Client();

        $client->fullname = $validated["fullname"];
        $client->city = $validated["city"];
        $client->phone = $validated["phone"];
        $client->email = $validated["email"];

        $client->save();

        return redirect('admin/clients')->with("success", __("messages.success_create_client"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('clients.edit', ['client' => Client::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fullname' => 'required|max:255',
            'city' => 'required|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email|max:255',
        ]);

        $client = Client::find($id);

        $client->fullname = $validated["fullname"];
        $client->city = $validated["city"];
        $client->phone = $validated["phone"];
        $client->email = $validated["email"];

        $client->save();

        return redirect('admin/clients')->with("success", __("messages.success_edit_client"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        if ($client) {
            $client->delete();
        }
        return redirect()->back()->with("success", __("messages.success_delete_client"));
    }
}
