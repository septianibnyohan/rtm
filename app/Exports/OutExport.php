<?php

namespace App\Exports;

use App\Models\Out;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OutExport implements FromCollection, Responsable, WithHeadings
{
    use Exportable;
    
    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'Out.xlsx';
    
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

            $list_out = Out::whereBetween('tanggal', [$from, $to])->get();
        }
        else
        {
            $list_out = Out::orderBy('id', 'DESC')->get();
        }

        return $list_out;
    }

    public function headings(): array
    {
        return [
            [
                'Download '.date("Y-m-d").' '.date('H:i:s')
            ],
            [
    
            ],
            ["Id", "No", "Tanggal", "Waktu"]
        ];
    }
}
