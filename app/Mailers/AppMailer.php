<?php
namespace App\Mailers;

use App\leaveApplication;
use App\User;
use Illuminate\Contracts\Mail\Mailer;


class AppMailer{
  protected $mailer;
  protected $fromAddress = 'support@smartweb.dev';
  protected $fromName = 'Employee Leave Application';
  protected $to;
  protected $subject;
  protected $view;
  protected $data = [];
  
  
  public function __construct(Mailer $mailer)
  {
    $this->mailer = $mailer;
  }
  
  public function sendLeaveInfo($user, leaveApplication $leaveApplication)
  {
    $this->to = $user->email;
    $this->subject = "[Leave Application ID: $leaveApplication->id ] $leaveApplication->title";
    $this->view = "emails.leave_info";
    $this->data = compact('user', 'leaveApplication');
    
    return $this->deliver();
  }
  
  public function sendLeaveComments($applicant, $user, leaveApplication $leaveApplication, $comment)
  {
      $this->to = $applicant->email;
      $this->subject = "RE: $leaveApplication->title (Application ID: $leaveApplication->leave_id)";
      $this->view = 'emails.leave_comments';
      $this->data = compact('applicant', 'user', 'leaveApplication', 'comment');

      return $this->deliver();
  }
  
  public function sendStatusNotification($applicant, leaveApplication $leaveApplication)
  {
      $this->to = $applicant->email;
      $this->subject = "RE: $leaveApplication->title (Application ID: $leaveApplication->leave_id)";
      $this->view = 'emails.leave_application_status';
      $this->data = compact('applicant', 'leaveApplication');

      return $this->deliver();
  }
  
  public function deliver(){
    $this->mailer->send($this->view, $this->data, function($message)
    {
        $message->from($this->fromAddress, $this->fromName)->to($this->to)->subject($this->subject);
    });
  }
}