<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'libelle' => $this->libelle,
            'prix' => $this->prix,
            'stock' => $this->stock,
            'reference' => $this->reference,
            'categorie' => new CategorieResource($this->categorie),
            'fournisseur' => new FournisseurResource($this->fournisseur),
        ];
    }
}
