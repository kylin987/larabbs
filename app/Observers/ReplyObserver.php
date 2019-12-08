<?php

namespace App\Observers;

use App\Models\Reply;
use App\Jobs\RepliesCount;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        //$reply->topic->reply_count = $reply->topic->replies->count();
        //$reply->topic->save();
        //dispatch(new RepliesCount($reply));
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    public function updating(Reply $reply)
    {
        //
    }

    public function saved(Reply $reply)
    {
        //$reply->topic->reply_count = $reply->topic->replies->count();
        //$reply->topic->save();
        dispatch(new RepliesCount($reply));
    }
}
