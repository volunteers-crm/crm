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

use App\Models\RoleCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up()
    {
        Schema::create('roles', static function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(RoleCategory::class)->constrained()->cascadeOnDelete();

            $table->string('title');

            $table->boolean('can_storage')->default(false);

            $table->timestamps();

            $table->unique(['role_category_id', 'title']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};