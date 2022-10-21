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

app('router')
    ->name('auth.')
    ->prefix('auth')
    ->group(__DIR__ . '/groups/_auth.php');

app('router')
    ->name('user.')
    ->prefix('user')
    ->middleware('auth.token')
    ->group(__DIR__ . '/groups/_user.php');
