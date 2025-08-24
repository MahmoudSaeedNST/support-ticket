<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function index()
    {
        $data = Ticket::latest()->get();
        return Inertia::render('Tickets/Index', [
            'tickets' => $data,
        ]);
    }

    // create
    public function create()
    {
        return Inertia::render('Tickets/Create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Ticket::create($request->only('title', 'description'));
        return redirect()->route('tickets.index');
    }

    public function show(Ticket $ticket)
    {
        return Inertia::render('Tickets/Show', ['ticket' => $ticket]);
    }
    
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate(['status' => 'required|in:open,closed']);
        $ticket->update(['status' => $request->status]);
        return redirect()->route('tickets.index');
    }
}
