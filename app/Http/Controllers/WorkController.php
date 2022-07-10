<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;
use App\Models\Ball;

class WorkController extends Controller
{
    public function addBucketVolume(Request $request){
        $bucket = Bucket::where('name','A')->first();
        if(is_null($bucket)){
            $bucket = new Bucket();
            $bucket->name = 'A';
            $bucket->vf = $request->input('A');
            $bucket->ve = 0;
            $bucket->save();
        }
        else
        {
            $bucket->vf = $request->input('A');
            $bucket->save();
        }
        $bucket = Bucket::where('name','B')->first();
        if(is_null($bucket)){
            $bucket = new Bucket();
            $bucket->name = 'B';
            $bucket->vf = $request->input('B');
            $bucket->ve = 0;
            $bucket->save();
        }
        else
        {
            $bucket->vf = $request->input('B');
            $bucket->save();
        }
        $bucket = Bucket::where('name','C')->first();
        if(is_null($bucket)){
            $bucket = new Bucket();
            $bucket->name = 'C';
            $bucket->vf = $request->input('C');
            $bucket->ve = 0;
            $bucket->save();
        }
        else
        {
            $bucket->vf = $request->input('C');
            $bucket->save();
        }
        $bucket = Bucket::where('name','D')->first();
        if(is_null($bucket)){
            $bucket = new Bucket();
            $bucket->name = 'D';
            $bucket->vf = $request->input('D');
            $bucket->ve = 0;
            $bucket->save();
        }
        else
        {
            $bucket->vf = $request->input('D');
            $bucket->save();
        }
        $bucket = Bucket::where('name','E')->first();
        if(is_null($bucket)){
            $bucket = new Bucket();
            $bucket->name = 'E';
            $bucket->vf = $request->input('E');
            $bucket->ve = 0;
            $bucket->save();
        }
        else
        {
            $bucket->vf = $request->input('E');
            $bucket->save();
        }
    }

    public function addBallVolume(Request $request){
        $ball = Ball::where('color','Pink')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Pink';
            $ball->v = $request->input('A');
            $ball->n = 0;
            $ball->save();
        }
        else
        {
            $ball->v = $request->input('A');
            $ball->save();
        }

        $ball = Ball::where('color','Red')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Red';
            $ball->v = $request->input('B');
            $ball->n = 0;
            $ball->save();
        }
        else
        {
            $ball->v = $request->input('B');
            $ball->save();
        }

        $ball = Ball::where('color','Blue')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Blue';
            $ball->v = $request->input('C');
            $ball->n = 0;
            $ball->save();
        }
        else
        {
            $ball->v = $request->input('C');
            $ball->save();
        }

        $ball = Ball::where('color','Orange')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Orange';
            $ball->v = $request->input('D');
            $ball->n = 0;
            $ball->save();
        }
        else
        {
            $ball->v = $request->input('D');
            $ball->save();
        }

        $ball = Ball::where('color','Green')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Green';
            $ball->v = $request->input('E');
            $ball->n = 0;
            $ball->save();
        }
        else
        {
            $ball->v = $request->input('E');
            $ball->save();
        }
    }

    public function addBallCount(Request $request){
        $ball = Ball::where('color','Pink')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Pink';
            $ball->n = $request->input('A');
            $ball->save();
        }
        else
        {
            $ball->n = $request->input('A');
            $ball->save();
        }

        $ball = Ball::where('color','Red')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Red';
            $ball->n = $request->input('B');
            $ball->save();
        }
        else
        {
            $ball->n = $request->input('B');
            $ball->save();
        }

        $ball = Ball::where('color','Blue')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Blue';
            $ball->n = $request->input('C');
            $ball->save();
        }
        else
        {
            $ball->n = $request->input('C');
            $ball->save();
        }

        $ball = Ball::where('color','Orange')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Orange';
            $ball->n = $request->input('D');
            $ball->save();
        }
        else
        {
            $ball->n = $request->input('D');
            $ball->save();
        }

        $ball = Ball::where('color','Green')->first();
        if(is_null($ball)){
            $ball = new Ball();
            $ball->color = 'Green';
            $ball->n = $request->input('E');
            $ball->save();
        }
        else
        {
            $ball->n = $request->input('E');
            $ball->save();
        }
    }

    public function packing($weight,$n,$c){
        $res = 0;
        $rem = $c[0][1];

        $data['bucket count'] = 0;
        $data['buckets']=[];

        $sumW =0;
        $sumC =0;

        for($i=0;$i<$n;$i++)
        {
            $sumW+=$weight[$i][1];
        }
        for($i=0;$i<count($c);$i++)
        {
            $sumC+=$c[$i][1];
        }
        if($sumW>$sumC){
            return $data;
        }

        for($i=0;$i<$n;$i++)
        {
            if ($rem >= $weight[$i][1])
            {
                $rem=$rem-$weight[$i][1];
            }
            else
            {
                $res += 1;
                if($res >= count($c))
                {
                    return $data;
                }
                $rem = $c[$res][1] - $weight[$i][1];
            }
            if(!isset($bbn[$res][$weight[$i][0]]))
                $bbn[$res][$weight[$i][0]]=0;
            $bbn[$res][$weight[$i][0]]+=1;
        }

        $data['bucket count'] = $res+1;
        $data['buckets']=[];

        for($i=0;$i<=$res;$i++){
            $kb = array_keys($bbn[$i]);
            $bucket['name']=$c[$i][0];
            $bucket['balls']=[];
            for($j=0;$j<count($kb);$j++){
                array_push($bucket['balls'], [$kb[$j],$bbn[$i][$kb[$j]]]);
            }
            array_push($data['buckets'], $bucket);
        }

        return $data;
    }

    public function doWork(){
        $bd = Ball::select("color", "v", "n")->get();
        $bcd = Bucket::select("name", "vf")->orderBy('vf','desc')->get();
        $weight = array();
        foreach($bd as $b){
            for($i=0; $i<$b->n; $i++)
            {
                array_push($weight,[$b->color,$b->v]);
            }
        }
        $c = array();
        foreach($bcd as $bc){
            array_push($c, [$bc->name,$bc->vf]);
        }
        
        // print(json_encode($this->packing($weight,count($weight),$c)));

        return view('suggest')->with(['suggest'=>$this->packing($weight,count($weight),$c)]);
    }
}


