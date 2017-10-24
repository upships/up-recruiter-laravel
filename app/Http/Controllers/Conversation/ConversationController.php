<?php

namespace App\Http\Controllers\Conversation;

use App\Models\Conversation\Conversation;
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
        //
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
            $recipients = explode(',', request('recipients'));

            // If there are recipients
            if(count($recipients) > 0)  {

                $recipients = collect($recipients)->each( function ($recipient) {

                    if(intval($recipient) > 0)  {
                        return intval($recipient);
                    }
                });

                return view('app.conversations.add', compact('recipients'));
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
        $type = 1;

        if($request->input('job_id'))  {

            $type = 2;
        }

        // Add conversation

        $conversation = Conversation::make(['type' => $type, 'job_id' => @$request->input('job_id'), 'recruiter' => auth()->user()->recruiter->id ]);

        auth()->user()->company()->conversations()->save($conversation);

        // Add members
        if($request->input('members')) {

            $conversation->members()->saveMany($request->input('members'));
        }

        // Add messages

            // Get the Member ID of the current user, who is sending the message
            $sender = ConversationMember::where(['user_id' => auth()->user()->id, 'conversation_id' => $conversation->id])->first();

            // Dispatch the Event, which will in turn save the messages and send out e-mails and notifications.
            event(new \App\Events\ConversationMessageSent($conversation, $sender, $message));

        if(request()->ajax())   {

            return response()->json($conversation->load(['members', 'messages']));
        }

        return redirect('/conversations/' . $conversation->id)->with('message', 'Message sent to users.');
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
