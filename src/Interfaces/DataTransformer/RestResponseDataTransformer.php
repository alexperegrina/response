<?php
declare(strict_types=1);

namespace AlexPeregrina\Response\Interfaces\DataTransformer;

use AlexPeregrina\Response\Interfaces\Dto\DtoResponse;
use AlexPeregrina\Response\Interfaces\Rest\RestResponse;
use AlexPeregrina\Response\Interfaces\Rest\RestResponseCollection;
use AlexPeregrina\Response\Interfaces\Rest\RestResponseItemCollection;

class RestResponseDataTransformer
{
    public static function toRestResponse(DtoResponse $dtoResponse): RestResponse
    {
        return new RestResponse($dtoResponse);
    }

    protected static function toRestResponseItemCollection(DtoResponse $dtoResponse): RestResponseItemCollection
    {
        return new RestResponseItemCollection($dtoResponse);
    }

    /**
     * @param int $typeCollection = $t -->
     * $t == 0 -> param status in all items,
     * $t == 1 -> param status in all items,
     * $t == 2 -> not use payload for each item
     * @return RestResponseCollection
     */
    public static function transformFromDtoResponseCollection(array $dtoResponses, int $typeCollection = 0): RestResponseCollection
    {
        $restResponseCollection = new RestResponseCollection();

        switch ($typeCollection) {
            case 0:
                foreach ($dtoResponses as $dtoResponse) {
                    $restResponseCollection->addRestResponse(self::toRestResponse($dtoResponse));
                }
                break;
            case 1:
                foreach ($dtoResponses as $dtoResponse) {
                    $restResponseCollection->addRestResponseItemCollection(self::toRestResponseItemCollection($dtoResponse));
                }
                break;
            case 2:
                $restResponseCollection = new RestResponseCollection($dtoResponses);
                break;
        }

        return $restResponseCollection;
    }
}