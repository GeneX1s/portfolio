<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AllTablesImport implements WithMultipleSheets
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function sheets(): array
    {
        return [
            new TransactionImport($this->request),
            new UsersImport($this->request),
            new BalanceImport($this->request),
            new MemberImport($this->request),
            new TeacherImport($this->request),
            new ScheduleImport($this->request),
            new ClassImport($this->request),
            new FeatureImport($this->request),
            new ParticipantImport($this->request),
            // Add more Imports here
        ];
    }
}
