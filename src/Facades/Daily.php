<?php


namespace JasiriLabs\Daily\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @method static \JasiriLabs\Daily\Daily getDomainInfo()
 * @method static \JasiriLabs\Daily\Daily setDomainInfo(array $properties)
 *
 *
 *
 * @method static \JasiriLabs\Daily\Daily listRooms(string $param = null)
 * @method static \JasiriLabs\Daily\Daily createRoom(string $name, bool $private, array $properties)
 * @method static \JasiriLabs\Daily\Daily showRoom(string $param)
 * @method static \JasiriLabs\Daily\Daily updateRoom(string $name, bool $private = null, array $properties = null)
 * @method static \JasiriLabs\Daily\Daily deleteRoom(string $param)
 *
 *
 *
 * @see \JasiriLabs\Daily\Daily
 */

class Daily extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-daily';
    }
}
