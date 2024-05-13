<?php

namespace App\Listeners;

use App\Events\PingPerformed;

class PingPerformedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PingPerformed $event): void
    {
        // Aquí colocas la lógica para manejar el evento PingPerformed
        $result = $event->result;

        // Por ejemplo, podrías registrar el resultado del ping o tomar alguna acción en respuesta al ping.
        if ($result) {
            \Log::info('Ping was successful!');
        } else {
            \Log::warning('Ping failed!');
        }
    }
}
