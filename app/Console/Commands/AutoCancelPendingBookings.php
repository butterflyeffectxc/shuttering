<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoCancelPendingBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:auto-cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        $bookings = Booking::where('status', 'pending')
            ->whereDate('session_date', '<=', $today->addDays(3))
            ->get();

        foreach ($bookings as $booking) {
            $booking->update([
                'status' => 'canceled'
            ]);
        }

        $this->info('Pending bookings auto-canceled successfully.');
    }
}
