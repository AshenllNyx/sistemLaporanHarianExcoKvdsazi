<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id_laporan';
    protected $fillable = [
        'user_id',
        'date_submitted',
        'date_reported',
        'date_approved',
        'status',
        'resubmission_reason',
    ];

    public function sicknessReports()
    {
        return $this->hasMany(SicknessReport::class, 'report_id', 'id_laporan');
    }

    public function disciplineReports()
    {
        return $this->hasMany(DisciplineReport::class, 'report_id', 'id_laporan');
    }

    public function dormReports()
    {
        return $this->hasMany(DormReport::class, 'report_id', 'id_laporan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'no_ic');
    }

    public function dormListForDormReport($dormReportId)
    {
        $dormReport = $this->dormReports()->find($dormReportId);
        if ($dormReport) {
            return \App\Models\DormList::where('dormitory_name', $dormReport->dormitory_name)->get();
        }
        return collect();
    }
}
