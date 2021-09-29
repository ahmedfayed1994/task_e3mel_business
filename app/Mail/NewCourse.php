<?php

namespace App\Mail;

use App\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCourse extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
//            ->attach(
//                storage_path('app/public'). '/' .$this->course->image->path,
//                [
//                    'as' => 'course_picture.jpg',
//                    'mime' => 'image/jpeg'
//                ]
//            )
            ->attachFromStorage($this->course->image->path, 'course_picture.jpg')
//            ->attachFromStorageDisk($this->course->image->path)

            ->from('admin@e3mel_business.com', 'admin')
            ->subject('New Course', $this->course)
            ->view('emails.newCourse');
    }
}
