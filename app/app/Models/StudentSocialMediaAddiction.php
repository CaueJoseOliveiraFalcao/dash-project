<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSocialMediaAddiction extends Model
{
    protected $table = 'Students_Social_Media_Addiction';

    public $timestamps = false;

    protected $fillable = [
        'Student_ID',
        'Age',
        'Gender',
        'Academic_Level',
        'Country',
        'Avg_Daily_Usage_Hours',
        'Most_Used_Platform',
        'Affects_Academic_Performance',
        'Sleep_Hours_Per_Night',
        'Mental_Health_Score',
        'Relationship_Status',
        'Conflicts_Over_Social_Media',
        'Addicted_Score',
    ];

    protected $primaryKey = 'Student_ID';

    public $incrementing = false;
    protected $keyType = 'int';
}
