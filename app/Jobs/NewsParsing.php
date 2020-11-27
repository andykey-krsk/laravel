<?php

namespace App\Jobs;

use App\Models\Source;
use App\Service\XmlParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Source
     */
    private Source $source;

    private int $category;

    /**
     * Create a new job instance.
     *
     * @param Source $source
     * @param $category
     */
    public function __construct(Source $source, $category)
    {
        $this->source = $source;
        $this->category = $category;
    }

    /**
     * Execute the job.
     *
     * @param XmlParserService $service
     * @return void
     */
    public function handle(XmlParserService $service)
    {
        $news = $service->parse($this->source, $this->category);
        echo sprintf("Job for %s execited.%s%s news was added.%s", $this->source->source, PHP_EOL, $news, PHP_EOL);
    }
}
