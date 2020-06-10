<?php

namespace App\Jobs;

use PDF;
use Mail;
use Storage;
use App\Resume;
use App\Mail\ExportedCv;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendCvToEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \App\Resume
     */
    protected $resume;

    /**
     * Create a new job instance.
     *
     * @param  \App\Resume  $resume
     * @return void
     */
    public function __construct(Resume $resume)
    {
        $this->resume = $resume->withoutRelations();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = ['resume' => $this->resume];
        $pdf = PDF::loadView('cv', $data)->output();
        $fileName = "cv-{$this->resume->id}.pdf";
        Storage::disk('public')->put($fileName, $pdf);
        $pdfUrl = asset("storage/{$fileName}");
        $user = $this->resume->user;
        
        Mail::to($user)->send(
            new ExportedCv($pdfUrl, $user->name)
        );
    }
}
