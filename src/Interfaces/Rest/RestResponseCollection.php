<?php
declare(strict_types=1);

namespace AlexPeregrina\Response\Interfaces\Rest;

use AlexPeregrina\Response\Interfaces\Dto\DtoResponse;

class RestResponseCollection extends AbstractRestResponse implements InterfaceRestResponseCollection
{
    /** @var RestResponse[]|RestResponseItemCollection[]|DtoResponse[] */
    private array $data;

    public function __construct(array $restResponse = [])
    {
        parent::__construct("ok");
        $this->data = $restResponse;
    }

    /**
     * @return RestResponse[]|RestResponseItemCollection[]|DtoResponse[]
     */
    public function data(): array
    {
        return $this->data;
    }

    public function addRestResponse(RestResponse $restResponse): void
    {
        $this->data[] = $restResponse;
    }

    public function addRestResponseItemCollection(RestResponseItemCollection $basicRestResourceItemCollection): void
    {
        $this->data[] = $basicRestResourceItemCollection;
    }

    public function addDtoResponse(DtoResponse $dtoResponse): void
    {
        $this->data[] = $dtoResponse;
    }
}