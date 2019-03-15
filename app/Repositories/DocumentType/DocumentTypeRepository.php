<?php

namespace App\Repositories\DocumentType;

use App\Models\DocumentType;
use App\Repositories\BaseRepository;

class DocumentTypeRepository extends BaseRepository implements DocumentTypeRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function __construct(DocumentType $documentType)
    {
        $this->model = $documentType;
    }

    public function all()
    {

        return $this->model->all();
    }
}
