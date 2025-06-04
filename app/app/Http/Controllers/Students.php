<?php

namespace App\Http\Controllers;
use App\Models\StudentSocialMediaAddiction;
class Students extends Controller
{
    public function show(){
        $data = StudentSocialMediaAddiction::all();
        $mostUsedPlatformAndScore = [];
        $platformScore = [];
        foreach ($data as $value) {
            $platform = $value['Most_Used_Platform'];
            $studentScore = $value['Addicted_Score'];

            if(isset($platformScore[$platform])){
                $platformScore[$platform]['total_score'] += $studentScore;
                $platformScore[$platform]['count'] += 1;

            }else {
                $platformScore[$platform] = [
                'total_score' => $studentScore,
                'count' => 1,
            ];
            }

        }

        $avarage
        dd($platformScore);
        return view('dashboard');

    }
}
