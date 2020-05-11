<?php

namespace Iziedev\Iziecode\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Iziedev\Iziecode\App\Helpers\ControllerTrait;
use Iziedev\Iziecode\App\Models\Menu;
// use Iziedev\Iziecode\App\Helpers\AppHelper;

class MenuController extends Controller
{
    use ControllerTrait;

    private $template = [
        'title' => 'Menu',
        'route' => 'admin.menu',
        'menu' => 'menu',
        'icon' => 'fa fa-users',
        'theme' => 'skin-blue',
        'config' => [
            'index.delete.is_show' => false
        ]
    ];

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
                'option' => $menus,
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
        $template = (object) $this->template;
        $form = $this->form();
        $data = Menu::all();
        return view('iziecode::master.index',compact('template','form','data'));
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
        return view('iziecode::master.create',compact('template','form'));
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
        $data = Menu::find($id);
        $template = (object) $this->template;
        $form = $this->form();
        return view('iziecode::master.show',compact('data','template','form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Menu::find($id);
        $template = (object) $this->template;
        $form = $this->form();
        return view('iziecode::master.edit',compact('data','template','form'));
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
        $this->formValidation($request);
        Menu::find($id)
            ->update($request->all());
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
        Menu::find($id)
            ->delete();
        Alert::make('success','Berhasil simpan data');
        return redirect(route($this->template['route'].'.index'));
    }
}

