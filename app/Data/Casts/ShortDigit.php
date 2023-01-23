<?php

/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Data\Casts;

use DragonCode\Support\Facades\Helpers\Digit;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class ShortDigit implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): string
    {
        return Digit::toShort((float) $value, suffix: 'b');
    }
}
