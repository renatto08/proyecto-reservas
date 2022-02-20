<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Backpack\Settings\app\Models\Setting;

class ClearReserved extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:reservas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpiar reservas fuera de tiempo.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $orders = Order::where('status','reserva')->whereRaw('DATE_ADD(created_at,INTERVAL '.Setting::get('duracion_reserva').' MINUTE) <= DATE_ADD(NOW(),INTERVAL 2 HOUR)');
        $update_count = $orders->update(['status'=>'cerrado']);
        $this->info("Successfull task , ${update_count} rows updated!");
    }
}
