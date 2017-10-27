<?php

namespace App\Http\Controllers\Conversation;

use App\Models\Conversation;
use App\Models\Conversation\ConversationMember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Conversation::all(); //auth()->user()->company->conversations()->get();

        if(request()->ajax())   {

            return response()->json($conversations->load(['members', 'messages']));
        }

        return view('app.conversations.index', compact('conversations'));
    }

    /**
     * Show the form for creating a new resource.
     *  @param string $recipients = user1,user2,user3
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Receive the Recipients via GET
        if(request('recipients'))   {

            // Explode the string by comma then put them in an array
            $users = explode(',', request('recipients'));
            $users = \App\User::whereIn('id', $users)->get();

            // If there are recipients
            if($users->count() > 0)  {

                $selection_id = request('selection_id');

                return view('app.conversations.add', compact('users'));
            }
        }
        else {

            return back()->with('error', 'You have to specify at least one recipient');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'users' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);


        $type = 1;

        // Add conversation
        $conversation = Conversation::make(['recruiter_id' => auth()->user()->recruiter->id ]);

        if($request->input('job_id'))  {

            $type = 2;
            $conversation->job_id = $request->input('job_id');
        }
        elseif ($request->input('selection_id')) {
            
            $type = 3;
            $conversation->selection_id = $request->input('selection_id');
        }

        $conversation->type = $type;

        auth()->user()->company->conversations()->save($conversation);

        // Add members
        if($request->input('users')) {

            // Members are User IDs
            $users = collect($request->input('users'));

            $users->each(function($user_id) use ($conversation)  {

                $member = ConversationMember::make(['conversation_id' => $conversation->id,'user_type' => 2, 'user_id' => $user_id]);

                $conversation->members()->save($member);
            });
        }

        // Add messages

            // Insert the current recruiter as a recipient
            $sender = ConversationMember::create(['user_id' => auth()->user()->id, 'conversation_id' => $conversation->id, 'user_type' => 1]);

            // Message Object
            $message = (object) ['subject' => $request->input('subject'), 'message' => $request->input('message')];

            // Dispatch the Event, which will in turn save the messages and send out e-mails and notifications.
            event(new \App\Events\ConversationMessageSent($conversation, $sender, $message));

        if(request()->ajax())   {

            return response()->json($conversation->load(['members', 'messages']));
        }

        return redirect('/conversation/' . $conversation->id)->with('message', 'Message sent to users.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conversation\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        if(request()->ajax())   {

            return response()->json($conversation->load(['members', 'messages']));
        }

        return view('app.conversations.view', compact('conversation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conversation\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversation\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conversation\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
