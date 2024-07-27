<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\RenderService;
use App\Service\ReportService;
use App\Service\SourceService;
use AppLogger;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\HtmlResponse;
use Monolog\Logger;

class HomeController
{
    private Logger $logger;

    public function __construct()
    {
        $this->logger = AppLogger::getLogger();
    }

    public function index(): Response
    {
        try {
            $report = new RenderService();
            $source = new SourceService();

            $reportService = new ReportService();
            $result = $reportService->create($report, $source->getFormatted());

            if (!$result) {
                throw new \RuntimeException('Невозможно создать отчет');
            }
        } catch (\Throwable $e) {
            $this->logger->error('Cannot create a report. Message: ' . $e->getMessage());

            return new HtmlResponse((new SourceService())->load('pages/error.php'));
        }

        return new HtmlResponse($result);
    }
}
