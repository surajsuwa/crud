<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Biodata;
class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodatas = Biodata::latest()->paginate(2);
        return view('biodata.index', compact('biodatas'))
                  ->with('i', (request()->input('page',1) -1)*2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biodata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title' => 'required',
          'description' => 'required'
        ]);

        Biodata::create($request->all());
        return redirect()->route('biodata.index')
                        ->with('success', 'new biodata created successfully');

       if ($request->hasfile('image')){
           $file = $request->file('image');
           $extension = $file->getClientOriginalExtension();
           $filename =time().'.'.$extension;
           $file->move('uploads/',$filename);
           $employee->image = $filename;
       }else{
           return $request;
           $biodata->image='';
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
        $biodata = Biodata::find($id);
        return view('biodata.detail', compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view('biodata.edit', compact('biodata'));
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
      $request->validate([
        'title' => 'required',
        'description' => 'required'
      ]);
      $biodata = Biodata::find($id);
      $biodata->title = $request->get('title');
      $biodata->description = $request->get('description');


        // Check if request file name has image
        if ($request->hasfile('image')){

            // Get image name=file from form
            $file = $request->file('image');
            //get orginal image extension
            $extension = $file->getClientOriginalExtension();
            //save image extension in current timestamp
            $filename = time().'.'.$extension;
            //automatically create a upload folder and save to this folder
            $file->move('uploads/',$filename);
            $biodata->image = $filename;
            
            //if you are not choosing the image it will return the request
        }
        //save all the data

      $biodata->save();
      return redirect()->route('biodata.index')
                      ->with('success', 'Biodata siswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biodata = Biodata::find($id);
        $biodata->delete();
        return redirect()->route('biodata.index')
                        ->with('success', 'Biodata siswa deleted successfully');
    }
}
