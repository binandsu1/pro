<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Crm\Models\CrmCallRecordLog;
use Modules\Curd\Models\XdoData;

class CurdExport implements FromArray, ShouldAutoSize,WithHeadings
{

    public function collection()
    {
    }

    public function __construct(Collection $records)
    {
        $this->records = $records;
    }

    public function array():array
    {
        $sheet = [];
        foreach($this->records as $record) {
            $sheet[] = $record->toExcelData();
        }
        return $sheet;
    }

    public function headings(): array
    {
        return array_values(XdoData::$excelHeaders);
    }
}
