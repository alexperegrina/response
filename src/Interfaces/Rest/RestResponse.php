<?php
declare(strict_types=1);

namespace AlexPeregrina\Response\Interfaces\Rest;

use AlexPeregrina\Response\Interfaces\Dto\DtoResponse;

class RestResponse extends AbstractRestResponse
{
    public function __construct(private DtoResponse $data)
    {
        parent::__construct("ok");
    }

    public function data(): DtoResponse
    {
        return $this->data;
    }
}