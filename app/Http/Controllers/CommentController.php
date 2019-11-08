<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Post;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(CommentRequest $request,$topic_type, $topic_id)
    {
        try {
            if($request->isMethod('post')){
				
                $comment = \App\Models\Comment::create([
					'topic_type' => $request->topic_type,
					'topic_id' => $request->topic_id,
					'name' => $request->name,
					'email' => $request->email,
					'message' => $request->message,
				]);
                return response()->json([
                        'code'=> 1,
                        'message'=> __('comment.add_comment_success'),
						'comment' => view('widget.comment.detail',['comment'=>$comment])->render(),
                    ]);
            }
            

            // throw new \Exception('Loiox roi',1000);
        } catch (\Exception $e) {
            return response()->json([
                    'code'=>$e->getCode(),
                    'message'=> $e->getMessage()
                ]);
        }
    }
}
