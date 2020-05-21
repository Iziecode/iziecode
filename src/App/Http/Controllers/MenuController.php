<?php

namespace Iziedev\Iziecode\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Iziedev\Iziecode\App\Traits\ControllerTrait;
use Iziedev\Iziecode\App\Models\Menu;
use Iziedev\Iziecode\Helpers\Alert;
// use Iziedev\Iziecode\App\Helpers\AppHelper;

class MenuController extends Controller
{
    
    use ControllerTrait;

    private $template = [
        // 'page_title' => 'Admin Menu', 
        'title' => 'Menu',
        'route' => 'admin.menu',
        'menu' => 'menu',
        'icon' => 'list-outline',
        'theme' => 'skin-blue',
        'config' => [
            'index.delete.is_show' => false
        ]
    ];

    private function primaryKey(){
        return 'uuid';
    }
    

    private function form()
    {
        
        $menuFromDB = Menu::select('id as value','name as name')->get()->toArray();
        $menus = collect([
            [
                'value' => '',
                'name' => 'Tidak Ada'
            ]
        ]);
        
        $menus = $menus->merge($menuFromDB);
        
        return [
            [
                'label' => 'Name', 
                'name' => 'name',
                'view_index' => true
            ],
            [
                'label' => 'Route',
                'name' => 'route_name',
                'view_index' => true,
            ],
            [
                'label' => 'Icon',
                'name' => 'icon',
                'view_index' => true
            ],
            [
                'label' => 'Active Menu',
                'name' => 'active_menu',
                'view_index' => true
            ],
            [
                'label' => 'Parent Menu',
                'name' => 'parent_id',
                'type' => 'select',
                'required' => false,
                'options' => $menus,
                'view_index' => true,
                'view_relation' => 'parent->name',
                'validation.store' => '',
                'validation.update' => ''
            ]
        ];
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $primaryId = $this->primaryKey();
        $template = (object) $this->template;
        $form = $this->form();
        $data = Menu::all();
        return view(load_view('master.index'),compact('template','form','data','primaryId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $template = (object) $this->template;
        $form = $this->form();
        return view(load_view('master.create'),compact('template','form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValidation($request);
        $data = $request->all();
        Menu::create($data);
        Alert::make('success','Berhasil simpan data');
        return redirect(route($this->template['route'].'.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $primaryId = $this->primaryKey();
        $data = Menu::where($primaryId,$id)->first();
        
        $template = (object) $this->template;
        $form = $this->form();
        return view(load_view('master.show'),compact('data','template','form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $primaryId = $this->primaryKey();
        $data = Menu::where($primaryId,$id)->first();
        $template = (object) $this->template;
        $form = $this->form();
        // dd($data);
        return view(load_view('master.edit'),compact('data','template','form'));
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
        $data = $request->all();
        $this->formValidation($request);
        $primaryId = $this->primaryKey();
        // dd($data);
        Menu::find($id)
            ->update($data);
        Alert::make('success','Berhasil simpan data');
        return redirect(route($this->template['route'].'.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $primaryId = $this->primaryKey();
        Menu::where($primaryId,$id)
            ->delete();
        Alert::make('success','Berhasil simpan data');
        return redirect(route($this->template['route'].'.index'));
    }
}

