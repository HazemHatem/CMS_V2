<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Search\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * Handle the incoming request to display the contacts.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */

    public function __invoke(Request $request)
    {
        $contacts = Contact::latest('updated_at')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(10)
            ->appends($request->all());
        return view('Admin.Contact.index', compact('contacts'));
    }
}
