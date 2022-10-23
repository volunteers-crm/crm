<?php

/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2022 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Http\Resources\Pages;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Page */
class PageRawResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'slug'    => $this->slug,
            'title'   => $this->title,
            'content' => $this->content,
        ];
    }
}