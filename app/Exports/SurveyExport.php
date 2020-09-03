<?php

namespace App\Exports;

use App\SurveyResultModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SurveyExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SurveyResultModel::select(
            'provincial_council_name',
            'local_authority_name',
            'local_authority_type',
            'session_id',
            'session_year',
            'session_start_date',
            'session_end_date',
            'main_title_name',
            'main_no',
            'title_name',
            'title_no',
            'attr_name',
            'attr_no',
            'param_name',
            'type',
            'result'
        )->get();
    }

    public function headings(): array
    {
        return [
            'provincial Council',
            'Local Authority',
            'Local_Authority Type',
            'Session id',
            'session year',
            'session start date',
            'session end date',
            'main Title',
            'Main Title_No',
            'Sub Title',
            'Sub Title No',
            'Attribute Name',
            'Attribute_no',
            'Parameter',
            'Result Type',
            'Result',
        ];
    }
}
