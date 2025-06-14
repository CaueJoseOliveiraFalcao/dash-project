<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\StudentSocialMediaAddiction;

class Students extends Controller
{
 public function show()
{
    $data = StudentSocialMediaAddiction::all();

    // Função auxiliar para médias por grupo
    $mediaPorGrupo = function ($grouped) {
        return $grouped->map(function ($group) {
            return round($group->avg('Addicted_Score'), 2);
        });
    };

    // 1. Uso diário x score (faixas)
    $usageGrouped = $data->groupBy(function ($item) {
        return floor($item->Avg_Daily_Usage_Hours);
    });
    $usageVsScore = $mediaPorGrupo($usageGrouped)->sort();


    // 2. País x score
    $countryGrouped = $data->groupBy('Country');

    $countryVsScore = $mediaPorGrupo($countryGrouped)->sort();

    // 3. Plataforma x score
    $platformGrouped = $data->groupBy('Most_Used_Platform');
    $platformVsScore = $mediaPorGrupo($platformGrouped)->sort();

    // 4. Nível acadêmico x score
    $levelGrouped = $data->groupBy('Academic_Level');
    $levelVsScore = $mediaPorGrupo($levelGrouped);

    // 5. Sono x score (faixas de horas de sono)
    $sleepGrouped = $data->groupBy(function ($item) {
        return floor($item->Sleep_Hours_Per_Night);
    });
    $sleepVsScore = $mediaPorGrupo($sleepGrouped)->sort();

    // 6. Estado mental x score
    $mentalGrouped = $data->groupBy(function ($item) {
        return floor($item->Mental_Health_Score / 10) * 10; // agrupando por faixa de 10
    });
    $mentalVsScore = $mediaPorGrupo($mentalGrouped);

    // 7. Relacionamento x score
    $relationshipGrouped = $data->groupBy('Relationship_Status');
    $relationshipVsScore = $mediaPorGrupo($relationshipGrouped);

    return view('dashboard', [
        // Enviar todos os dados para análise
        'usageVsScore' => $usageVsScore,
        'countryVsScore' => $countryVsScore,
        'platformVsScore' => $platformVsScore,
        'levelVsScore' => $levelVsScore,
        'sleepVsScore' => $sleepVsScore,
        'mentalVsScore' => $mentalVsScore,
        'relationshipVsScore' => $relationshipVsScore,
    ]);
}

}

