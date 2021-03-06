<?php

namespace App\Jobs\MasterStatus;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Models\data_personalia;

class StatusSKKJob extends Job implements SelfHandling
{
    public $req;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $req)
    {
        $this->req = $req;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        data_personalia::create([
            'id_karyawan' => $this->req['id_karyawan'],
            'id_status' => $this->req['id_status'],
            'surat_keputusan' => $this->req['surat_keputusan'],
            'datetime_out' => date('Y-m-d',strtotime($this->req['datetime_in'])),
            'keterangan' => $this->req['keterangan']
            ]);

        return $this->req;
    }
}
