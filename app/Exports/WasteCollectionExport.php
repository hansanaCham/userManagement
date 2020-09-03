<?php

namespace App\Exports;

use App\WasteCollectionResult;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class WasteCollectionExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return WasteCollectionResult::select(
            'register_no',
            'waste_type_name',
            'ward_name',
            'amount',
            'is_accurate',
            'density',
            'ratio',
            'vehicle_capacity',
            'destination_type',
            'destination',
            'date',
            'submitted_date',
            'session',
            'from_type',
            'fron_name',
            'driver_first_name',
            'driver_last_name',
            'driver_nic'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Vehicle Register No',
            'Waste Type Name',
            'Ward Name',
            'Amount',
            'Accuracy(1=Accurate,0=Estimate)',
            'Waste Density',
            'Fill Factor',
            'Vehicle Capacity',
            'Destination Type',
            'Destination Name',
            'Date',
            'Submitted Date',
            'Session',
            'From Type',
            'From Name',
            'Driver First Name',
            'Driver Last Name',
            'Driver NIC',
        ];
    }
}
