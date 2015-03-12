<?php
namespace TypiCMS\Modules\Translations\Http\Controllers;

use Response;
use TypiCMS\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Translations\Repositories\TranslationInterface as Repository;

class ApiController extends BaseApiController
{
    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Get models
     * 
     * @return Response
     */
    public function index()
    {
        $models = $this->repository->all([], true);
        return Response::json($models, 200);
    }
}
