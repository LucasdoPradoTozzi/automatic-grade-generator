<?php

namespace App\Http\Controllers;

use App\Services\GradeGeneratorService;

use Illuminate\Http\Request;

use App\Models\Equivalence;

use Validator;
use Exception;

class TestController extends Controller
{
    //

    public function test(Request $req)
    {

        $params = $req->all();

        $arrayModuleIds = $params['arrayModuleIds'];

        $equivalences = Equivalence::whereIn('main_module_id', $arrayModuleIds)->get();

        if ($equivalences->isEmpty()) return 'Não tem equivalencia pra tu meu bom';

        $arrayEquivalenceIds = [];

        foreach ($equivalences as $equivalence) {
            $arrayEquivalenceIds[] = $equivalence->equivalence_module_id;
        }

        $arrayEquivalenceIds = array_values(array_unique($arrayEquivalenceIds));

        $gradeGenerator = new GradeGeneratorService($params['arrayDays']);

        $gradeGenerator->makeTheGrade($arrayEquivalenceIds);

        dd($gradeGenerator);
    }
}
