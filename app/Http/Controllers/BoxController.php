<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Domains\Box\DTO\CreateBoxDTO;
use App\Http\Requests\BoxCreateRequest;
use App\Domains\Box\UseCases\CreateBoxUseCase;
use App\Domains\Box\Contracts\BoxServiceContract;
use App\Domains\Box\Collections\EntitiesDTOCollection;
use App\Domains\Box\Collections\RecipientDTOCollection;

class BoxController extends Controller
{
    /**
     * @throws \Exception
     */
    public function create(BoxCreateRequest $request, BoxServiceContract $service): Response
    {
        Collection::
        $validated = $request->validated();

        $create_dto = new CreateBoxDTO(
            recipients: RecipientDTOCollection::fill($validated['recipients']),
            entities: EntitiesDTOCollection::fill($validated['entities'])
        );

        (new CreateBoxUseCase())->handle($create_dto, $service);

        return response()->noContent();
    }
}
