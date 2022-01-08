<?php
declare(strict_types=1);

namespace AlexPeregrina\Response\Interfaces\Rest;

use AlexPeregrina\Response\Interfaces\Dto\DtoResponse;

class RestResponseItemCollection
{
    public function __construct(private DtoResponse $data)
    {}

    public function data(): DtoResponse
    {
        return $this->data;
    }
}