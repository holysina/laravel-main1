<?php

namespace App\Http\Controllers;

use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class posts extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {
        if (!empty(request('search'))) {
            return view('listings.index', [
                'listings' => listing::search(request(['search']))
            ]);
        }
        if (!empty(request('tag'))) {
            return view('listings.tag-filter', [
                'listings' => listing::scopeFilter(request(['tag']))
            ]);
        } else {
            return view('listings.index', [
                'listings' => listing::index()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(listing $listing)
    {

        return view('listings.edit', ['listing' => listing::show(request('id'))]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return view('listings.show', [
            'posts' => listing::show($id)
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'email' => ['required', 'email'],
            'location' => 'required',
            'description' => 'required',
            'tag' => 'required',
            'image' => 'required',
            'url' => ['url', 'required']
        ]);
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');

        }
        $post = listing::query()->find($id);
        $post->update($formFields);
        return redirect("/listing/$id")->with('message', 'UPDATED SUCCESS fully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('posts', 'company')],
            'email' => ['required', 'email'],
            'location' => 'required',
            'description' => 'required',
            'tag' => 'required',
            'image' => 'required',
            'url' => ['url', 'required']
        ]);
        $formFields['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        listing::store($formFields);
        return redirect('/')->with('message', 'CREATED SUCCESS fully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(listing $listing, $id)
    {
        $user = $listing::destroy($id);

        return redirect('/')->with('message', 'DELETED SUCCESS FULLY');
    }


}
