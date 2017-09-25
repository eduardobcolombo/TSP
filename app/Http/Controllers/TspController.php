<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capital;
use App\CapitalDistance;

class TspController extends Controller
{
    public function index()
    {
        $capitals = Capital::all();
        return view('tsp.form', compact('capitals'));
    }

    public function make(Request $request)
    {
        $request->validate([
            'capital_from' => 'required|numeric',
            'population_size' => 'required|numeric',
            'number_of_generations' => 'required|numeric',
            'mutation_type' => 'required|numeric',
        ]);
        // getting the list of capitals
        $capital_from = (integer) $request->capital_from;
        $capitals = (new Capital)->all()->toArray();
        $cromossomDefault = [];
        $cromossoms = [];
        foreach ($capitals as $capital) {
            $capitalDistances[$capital['id']] = (new CapitalDistance)->where('capital_id', $capital['id'])->get()->toArray();
            if ($capital['id'] == $capital_from) {
                continue;
            }
            $cromossomeDefault[] = $capital['id'];
        }
        $count = count($cromossomeDefault) + 1;
        // creating a random cromossome
        for ($i=0; $i< $request->population_size; $i++) {
            $cromTemp = $cromossomeDefault;
            // shuffle the array to generate a new cromossome
            shuffle($cromTemp);
            array_unshift($cromTemp, $capital_from);
            $cromossomes[] = $this->getValues($cromTemp);
            // $checkDistance = function () use (&$capitalDistances, &$cromTemp, &$count) {
            //     return $capitalDistances[current($cromTemp)];
            //     return current($cromTemp);
            //     $key = array_search(current($cromTemp), array_column($capitalDistances[next($cromTemp)], 'capital_id_until'));
            //     return $capitalDistances[$key];
            //     // $value += $capitalDistances[] current($cromTemp) ;
            //     // for ($j=0; $j<$count; $j++) {
            //     //     $a=1;
            //     // }
            // // };
            // // dd($checkDistance());
            // $cromossomes[$i] = $cromTemp;
            // $cromossomes[$i]['value'] = $checkDistance;
        }
        dd($cromossomes);
    	// loop
	    	// make a fitness

	    	// make a crossover

	    	// make a mutation

	    	// store the best each result 

    	// final loop

    	// return the best result


        return view('tsp.form', compact('capitals'));
    }

    public function getValues($cromossome)
    {
        $capitalDistances = new CapitalDistance;
        $return = 0;
        $cromossome = [1,10,3,4];
        $prev = reset($cromossome);
        $current = next($cromossome);
        do {
            if ($prev < $current) {
                $query = $capitalDistances
                                ->where('capital_id', $prev)
                                ->where('capital_id_until', $current)
                                ->get();
            } else {
                $query = $capitalDistances
                                ->where('capital_id', $current)
                                ->where('capital_id_until', $prev)
                                ->get();
            }
            if (count($query) > 0){
                var_dump($current);
                $return += $query[0]->distance;
            }
            $current = next($cromossome);
            $prev = $current;


        } while ($current === false);

        dd($return);
        return $return;
    }
}
