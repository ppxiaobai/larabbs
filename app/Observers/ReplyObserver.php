<?php

namespace App\Observers;

use App\Models\Reply;
use PhpParser\Node\Expr\FuncCall;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function created(Reply $reply)
    {

        $reply->topic->reply_count = $reply->topic->replies->count();
        $reply->topic->save();
    }

    public function creating(Reply $reply)
    {

        $reply->content = clean($reply->content, 'user_topic_body');
    }
}
