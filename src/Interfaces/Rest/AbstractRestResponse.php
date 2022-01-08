<?php
declare(strict_types=1);

namespace AlexPeregrina\Response\Interfaces\Rest;

abstract class AbstractRestResponse
{
    protected function __construct(private string $status)
    {}

    public function status(): string
    {
        return $this->status;
    }
}