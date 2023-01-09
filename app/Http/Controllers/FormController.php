<?php

namespace App\Http\Controllers;

use App\Models\DynamicTable;
use App\Models\Form;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('form.index', compact('forms'));
    }
    public function saveForm(Request $request)
    {
        if (!empty($request->field_lable)) {
            $form = Form::create([
                'field_type' => $request->field_type,
                'field_lable' => $request->field_lable,
                'field_name' => $request->field_name,
                'field_placeholder' => $request->field_placeholder,
            ]);
            return response()->json($form);
        }
        if (!empty($request->textarea_label)) {
            $form = Form::create([
                'field_type' => $request->field_type_two,
                'field_lable' => $request->textarea_label,
                'field_name' => $request->text_area
            ]);
            return response()->json($form);
        }
        if (!empty($request->image_label)) {
            $form = Form::create([
                'field_type' => $request->field_type_three,
                'field_lable' => $request->image_label,
                'field_name' => $request->image_tag
            ]);
            return response()->json($form);
        }
    }
    public function destroy($id)
    {
        Form::find($id)->delete($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
    public function createTable($table_name, $fields = [])
    {
        if (!Schema::hasTable($table_name)) {
            Schema::create($table_name, function (Blueprint $table) use ($fields, $table_name) {
                $table->increments('id');
                if (count($fields) > 0) {
                    foreach ($fields as $field) {
                        // $table->{{$field['field_type']}};
                        $table->string($field['field_name']);
                    }
                }
                $table->timestamps();
            });

            return response()->json(['message' => 'Given table has been successfully created!'], 200);
        }

        return response()->json(['message' => 'Given table is already existis.'], 400);
    }
    public function operate()
    {

        $table_name = 'dynamic_table';

        $table_fields = Form::all();
        foreach ($table_fields as $field) {
            $postdata['field_name'] = $field->field_name;
            $postdata['field_type'] = $field->field_type;

            $fields[] =  $postdata;
        }
        dd($fields);
        return $this->createTable($table_name, $fields);
    }
    public function getallfields()
    {
        $fields = Form::all();
        return response()->json($fields);
    }
    public function getallcolumns(){
       $array= Schema::getColumnListing('dynamic_table');
    //    $array_rt = array_diff($array, ["id", "created_at","updated_at"]);
       return $array;
    }
    public function create_dynamic_table(Request $request){
    //    $create= DB::tabele('')->create($request->all());
    $create= DB::table('dynamic_table')->insert($request->all());
       return $create;
    }
}
