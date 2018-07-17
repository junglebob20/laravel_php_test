<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Intervention\Image\ImageManagerStatic as ImageInt;
use \Validator;
use App\Repositories\ImageRepository;

class ImagesController extends Controller
{
     /**
     * Экземпляр TaskRepository.
     *
     * @var ImageRepository
     */
    protected $images;
    /**
     * Construct new controller.
     *
     * @return void
     */
    public function __construct(ImageRepository $images)
    {
        $this->middleware('auth');
        $this->images = $images;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('images', [
            'items' => $this->images->getItems(),
            'sortColumn' => ['created','asc']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  string  $column
     * @param  string  $option
     * @return \Illuminate\Http\Response
     */
    public function sort(Request $request,$column,$option)
    {
        return redirect('images')->with('items',$this->images->getItemsBy($column,$option));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->getValidator($request);

        if ($validator->fails()) {
            return back()->with('fail','Image Upload failed, please check your image');
        }
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $input['imageName'] = time();
            $input['imageExt'] = $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images');
            $img = ImageInt::make($image->getRealPath());
            if(!$this->check_imageSize($image)){
                $img->resize(512, 512);
            }
            $img->save($destinationPath.'/'.$input['imageName'].'.'.$input['imageExt']);

            Image::create([
                'name' => $input['imageName'],
                'tag' => 'tag',
                'path'=> 'storage/images/',
                'ext'=> $input['imageExt']
            ]);

            return back()->with('success','Image Upload successful');
        }else{
            return back()->with('fail','Image Upload failed, please check your image');
        }
    }
    /**
     * Gets a new validator instance with the defined rules.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Support\Facades\Validator
     */
    protected function getValidator(Request $request)
    {
        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        return Validator::make($request->all(), $rules);
    }
    protected function check_imageSize($photo) {
        $maxHeight = 512;
        $maxWidth = 512;
        list($width, $height) = getimagesize($photo);
        if($width >= $maxWidth || $height >= $maxHeight){
            return false;
        }else{
            return true;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Image::where('id', $id)->delete()){
            return redirect('images');
        }
    }
}
