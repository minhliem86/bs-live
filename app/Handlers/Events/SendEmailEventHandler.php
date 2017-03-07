<?php namespace App\Handlers\Events;

use App\Events\SendEmailEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Mail;

class SendEmailEventHandler {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  SendEmailEvent  $event
	 * @return void
	 */
	public function handle(SendEmailEvent $event)
	{
		// Mail::send('Frontend::emails.customer-register',$event->data,function($mes) use ($event){
		// 	$mes->to('minhliemphp@gmail.com');
		// 	$mes->subject('BS Group - Customer Service');
		// });
		dd('test');

	}

}
