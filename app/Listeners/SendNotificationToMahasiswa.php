<?php

namespace App\Listeners;

use App\Events\NewPengumumanAdded;
use App\Models\Students;
use Illuminate\Contracts\Queue\ShouldQueue;
use Telegram\Bot\Laravel\Facades\Telegram;

class SendNotificationToMahasiswa implements ShouldQueue
{
    public function handle(NewPengumumanAdded $event)
    {
        // Get phone numbers from mahasiswas table
        $phoneNumbers = Students::pluck('phone_number')->toArray();

        // Send notification to each phone number
        foreach ($phoneNumbers as $phoneNumber) {
            Telegram::sendMessage([
                'chat_id' => $phoneNumber,
                // make the text bold and add emoji then line break, then the content of the announcement with "Halo pengumuman baru telah ditambahakan" 
                'text' => "<b>Halo pengumuman baru telah ditambahakan</b> \n\n" . $event->announcement->title . "\n\n" . $event->announcement->desc . "\n\n" . $event->announcement->link,
                'parse_mode' => 'HTML',
            ]);
        }
    }
}
