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

namespace App\Listeners\Bots;

use App\Events\Bots\BotCreatedEvent;

class RegisterWebhookListener
{
    public function handle(BotCreatedEvent $event): void
    {
        if ($this->allow()) {
            $event->bot->registerWebhook()->send();
        }
    }

    protected function allow(): bool
    {
        return (bool) config('telegraph.security.register_webhook_when_model_was_created');
    }
}
