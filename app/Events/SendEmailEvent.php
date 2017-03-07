<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class SendEmailEvent extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */

	public $data;
	public $mail_to;
	public function __construct($data, $mail_to)
	{
		$this->data = $data;
		$this->mail_to = $mail_to;
	}

}
