<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\leaveApplication;
use App\Comment;
use App\Mailers\AppMailer;
use App\Http\Requests;
use Auth;

class CommentsController extends Controller
{
   public function postComment(Request $request, AppMailer $mailer)
   {
       $this->validate($request, [
        'comment'   => 'required'
        ]);
     
        $comment = Comment::create([
            'leave_application_id' => $request->input('leave_application_id'),
            'user_id'   => Auth::user()->id,
            'comment'   => $request->input('comment'),
        ]);
        
        if ($comment->leaveApplication->user->id != Auth::user()->id) {
            $mailer->sendLeaveComments($comment->leaveApplication->user, Auth::user(), $comment->leaveApplication, $comment);
        }
     
        return back()->with("flash_message", "supervisors note has be submitted.");
   }
}
