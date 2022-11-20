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

namespace App\Data\Casts;

use DateInterval;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class Duration implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): string
    {
        $diff = $this->diff($value);

        return $diff->h
            ? implode(':', [$this->hours($diff), $this->minutes($diff), $this->seconds($diff)])
            : implode(':', [$this->minutes($diff), $this->seconds($diff)]);
    }

    protected function diff(int $duration): DateInterval
    {
        return now()->diff(now()->addSeconds($duration));
    }

    protected function hours(DateInterval $value): string
    {
        return $this->pad($value->h);
    }

    protected function minutes(DateInterval $value): string
    {
        return $this->pad($value->m);
    }

    protected function seconds(DateInterval $value): string
    {
        return $this->pad($value->s);
    }

    protected function pad(int $value): string
    {
        return str_pad((string) $value, 2, '0', STR_PAD_LEFT);
    }
}