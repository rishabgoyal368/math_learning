<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mcq;

class McqController extends Controller
{
    public function index(){
    	$addtion_questions 		= Mcq::where('type',1)->get()->ToArray();
    	$subtract_questions 	= Mcq::where('type',2)->get()->ToArray();
    	$multication_questions 	= Mcq::where('type',3)->get()->ToArray();
    	$division_questions 	= Mcq::where('type',4)->get()->ToArray();
    	$square_root_questions 	= Mcq::where('type',5)->get()->ToArray();
    	return view('Admin.mcq.list',compact('addtion_questions','subtract_questions','multication_questions','division_questions','square_root_questions'));
    }

    public function add_question(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		unset($data['_token']);
    		// dd($data);
    		$add_question 					= new Mcq;
    		$add_question->type 			= $data['type'];
    		$add_question->question 		= $data['question'];
    		$add_question->option_1 		= $data['option_1'];
    		$add_question->option_2 		= $data['option_2'];
    		$add_question->option_3 		= $data['option_3'];
    		$add_question->option_4 		= $data['option_4'];
    		$add_question->correct_option_no= $data['correct_option'];
    		if($data['correct_option'] == 'option_1'){
    			$type = $data['option_1'];
    		}elseif($data['correct_option'] == 'option_2'){
    			$type = $data['option_2'];
    		}elseif($data['correct_option'] == 'option_3'){
    			$type = $data['option_3'];
    		}elseif($data['correct_option'] == 'option_4'){
    			$type = $data['option_4'];
    		}
    		$add_question->correct_answer = $type;
    		if($add_question->save()){
    			return redirect('admin/mcq')->with('success','Question Added Successfully');
    		}else{
    			return redirect()->with('error','CommonError');
    		}
    	}
    	return view('Admin.mcq.form');
    }

    public function edit_question(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            unset($data['_token']);
            $edit_question                   = Mcq::find($id);
            $edit_question->question         = $data['question'];
            $edit_question->option_1         = $data['option_1'];
            $edit_question->option_2         = $data['option_2'];
            $edit_question->option_3         = $data['option_3'];
            $edit_question->option_4         = $data['option_4'];
            $edit_question->correct_option_no= $data['correct_option'];
            if($data['correct_option'] == 'option_1'){
                $type = $data['option_1'];
            }elseif($data['correct_option'] == 'option_2'){
                $type = $data['option_2'];
            }elseif($data['correct_option'] == 'option_3'){
                $type = $data['option_3'];
            }elseif($data['correct_option'] == 'option_4'){
                $type = $data['option_4'];
            }
            $edit_question->correct_answer = $type;
            if($edit_question->save()){
                return redirect()->back()->with('success','Question Edited Successfully');
            }else{
                return redirect()->with('error','CommonError');
            }
        }
        $question_details = Mcq::where('id',$id)->first();
        return view('Admin.mcq.form',compact('question_details'));   
    }


    public function delete($id)
    {
        $delete = Mcq::where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Question Deleted successfully');
        } else {
            return redirect('admin/category')->with('error', 'CommonError');
        }
    }

}
