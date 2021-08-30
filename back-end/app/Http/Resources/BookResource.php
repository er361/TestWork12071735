<?php

namespace App\Http\Resources;

use App\Book;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        /**
        * @var $this Book
        */
        return [
            'id' => $this->id,
            'title'=> $this->title,
            'cover' => $this->cover,
            'shortDesc'=> $this->shortDesc,
            'author'=> $this->author,
            'releaseYear'=> $this->releaseYear,
            'publisher'=> $this->publisher
        ];
    }
}
