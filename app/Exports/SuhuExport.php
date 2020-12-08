<?php

namespace App\Exports;

use App\Models\Suhu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use DB;

class SuhuExport implements FromCollection, Responsable, WithHeadings
{
    use Exportable;
    
    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'Suhu.xlsx';
    
    /**
    * Optional Writer Type
    */
    private $writerType = Excel::XLSX;
    
    /**
    * Optional headers
    */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    protected $start_date;
    protected $end_date;

    public function __construct($start_date = null, $end_date = null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if (isset($this->start_date) && isset($this->end_date))
        {
            $from = date($this->start_date);
            $to = date($this->end_date);

            //$list_suhu = Suhu::whereBetween('tanggal', [$from, $to])->get();
            $list_suhu = DB::table('suhu')->select('no', 'ldr', 'tanggal', 'waktu')->whereBetween('tanggal', [$from, $to])->orderBy('id', 'DESC')->get();
        }
        else
        {
            //$list_suhu = Suhu::orderBy('id', 'DESC')->get();
            $list_suhu = DB::table('suhu')->select('no', 'ldr', 'tanggal', 'waktu')->orderBy('id', 'DESC')->get();
        }

        return $list_suhu;
    }

    public function headings(): array
    {
        return 
        [
            [
                '# Download Date : '.date("Y-m-d").' ... '.date('H:i:s').' #'
            ],
            [
                isset($this->start_date) && isset($this->end_date) ? '# Data from '.$this->start_date.' until '.$this->end_date.' #' : '# Data : ALL #'
            ],
            [
    
            ],
            ["No", "Suhu", "Tanggal", "Waktu"]
        ];
    }
}
