<?php

namespace App\Exports;

use App\Models\Summary;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SummaryExport implements FromCollection, Responsable, WithHeadings
{
    use Exportable;
    
    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'Summary.xlsx';
    
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
            //echo "wew"; die();
            $from = date($this->start_date);
            $to = date($this->end_date);

            $list_sum = Summary::whereRaw(
                "(created_at >= ? AND created_at <= ?)", 
                [$from." 00:00:00", $to." 23:59:59"]
            )->get();
        }
        else
        {
            $list_sum = Summary::orderBy('id', 'DESC')->get();
        }

        return $list_sum;
    }

    public function headings(): array
    {
        return [
            [
                '# Download Date : '.date("Y-m-d").' ... '.date('H:i:s').' #'
            ],
            [
                isset($this->start_date) && isset($this->end_date) ? '# Data from '.$this->start_date.' until '.$this->end_date.' #' : 'All Date'
            ],
            [
    
            ],
            [
            'No',
            'Suhu Normal',
            'Suhu Tinggi',
            'Jumlah Masuk',
            'Jumlah Keluar',
            'Di Dalam Ruangan',
            'Kapasitas Ruangan',
            'Created At',
            'Updated At'
        ]];
    }
}
