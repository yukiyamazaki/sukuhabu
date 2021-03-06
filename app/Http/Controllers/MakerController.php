<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Post_like;
use App\Models\like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Http\UploadedFile;


// 主にUserからの命令を処理
class MakerController extends Controller
{
   // Topページへの遷移
   public function top(){
    //documentテーブルのデータを取得（新着順）
    $documents = Document::orderby('created_at','desc')->limit(3)->get();

    $document = Document::where('id',14)->first();

    //メイン部分のfile情報を取得
    $file_type = $document->file_type;
    $file_name =  str_replace('public/','',$file_type);


    //いいねが多い順で上位5件のPostを表示
    $documents_sums = Post_like::orderby('likeid_sum','desc')->limit(5)->get();

    //繰り返し構文を使用せず人気記事を取得
    $fav_1 = $documents_sums[0];
    $fav_2 = $documents_sums[1];
    $fav_3 = $documents_sums[2];
    $fav_4 = $documents_sums[3];
    $fav_5 = $documents_sums[4];

    //人気上位5位のidからdocument情報を取得
    $fov_1_id = $fav_1 ->id;
    $fov_2_id = $fav_2 ->id;
    $fov_3_id = $fav_3 ->id;
    $fov_4_id = $fav_4 ->id;
    $fov_5_id = $fav_5 ->id;


    //取得したIDから各々情報を取得
    $fav1_doc = Document::where('id',$fov_1_id)->first();
    $fav2_doc = Document::where('id',$fov_2_id)->first();
    $fav3_doc = Document::where('id',$fov_3_id)->first();
    $fav4_doc = Document::where('id',$fov_4_id)->first();
    $fav5_doc = Document::where('id',$fov_5_id)->first();
    $fav1_doc = Document::where('id',$fov_1_id)->first();
  
    //viewへ情報を投げる
    return view('/top',compact('documents','file_name','fav_1','fav_2','fav_3','fav_4','fav_5','fav1_doc','fav2_doc','fav3_doc','fav4_doc','fav5_doc'));

  }

    // content詳細を取得
    public function contents($id){
      //取得したidを元にdocumentテーブルから資料情報を取得
      $document = Document::where('id',$id)->first();
      //file情報を取得
      $file_type = $document->file_type;
      $subject = $document->subject;

      //取得したsubjectから関連科目を新着順に取得
      $relaiton_subjects = Document::orderby('created_at','desc')->where('subject','=',$subject)->limit(4)->get();

      //fileの情報を取得
      $file_name =  str_replace('public/','',$file_type);

      //関連科目のfileデータを取得
      // $file_names = $relaiton_subjects->file_type;
      // echo $file_names;

      //file_nameがあれば行ける
      return view('contents',compact('document','file_name','relaiton_subjects'));
    }

  // 資料投稿ページへの遷移
  public function upload(Request $request){

    return view('upload');
  }


  // 資料投稿処理
  public function upload_act(Request $request){
    //1.formで登録されたデータを取得＆保存
    $title = $request->get('title'); 
    $description = $request->get('description');
    $subject = $request->get('subject');
    $grade = $request->get('grade');
    $school_categroy = $request->get('category');
    $document_pass = $request->file;
    //投稿したfileの取得
    $filePath = $document_pass->store('public');

    //データベース登録
    $document = new Document;
    $document->title = $title;
    $document->discription = $description;
    $document->subject = $subject;
    $document->grade = $grade;
    $document->school_categroy = $school_categroy;
    $document->document_name = $document_pass;
    $document->file_type = str_replace('public/','',$filePath);
    $document->save();

    return redirect()->route('top');
  }
  
}