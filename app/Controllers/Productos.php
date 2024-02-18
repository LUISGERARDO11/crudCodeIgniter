<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto;
class Productos extends Controller{
    public function index(){
        $producto= new Producto();
        $datos['productos']=$producto->orderBy('id','DESC')->findAll();

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('productos/listar',$datos);
    }
    public function crear(){
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('productos/crear',$datos);
    }
    public function guardar(){ 
        $producto= new Producto();
        $validacion=$this->validate([
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required|min_length[3]',            
            'precio'=>'required',
            'stock'=>'required',
            'imagen'=>[
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);
        if(!$validacion){
            $session=session();
            $session->setFlashData('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }

        if($imagen=$this->request->getFile('imagen')){
            $nuevoNombre= $imagen->getRandomName();
            $imagen->move('../public/uploads/',$nuevoNombre);
            $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'descripcion'=>$this->request->getVar('descripcion'),
                'precioVenta'=>$this->request->getVar('precio'),
                'stock'=>$this->request->getVar('stock'),
                'imagen'=>$nuevoNombre
            ];
            $producto->insert($datos);

        }

        return $this->response->redirect(site_url('/listar'));
    }
    public function borrar($id=null){
        $producto= new Producto();
        $datosProducto= $producto->where('id',$id)->first();
        
        $ruta=('../public/uploads/'.$datosProducto['imagen']);
        unlink($ruta);
        $producto->where('id',$id)->delete($id);

        return $this->response->redirect(site_url('/listar'));

    }
    public function editar($id=null){
        $producto= new Producto();
        $datos['producto']=$producto->where('id',$id)->first();

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');
        return view('productos/editar',$datos);
    }
    public function actualizar(){
        $producto= new Producto();
        $datos=[
            'nombre'=>$this->request->getVar('nombre'),
            'descripcion'=>$this->request->getVar('descripcion'),
            'precioVenta'=>$this->request->getVar('precio'),
            'stock'=>$this->request->getVar('stock'),
        ];
        $id=$this->request->getVar('id');


        $validacion=$this->validate([
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required|min_length[3]',            
            'precio'=>'required',
            'stock'=>'required',
        ]);
        if(!$validacion){
            $session=session();
            $session->setFlashData('mensaje','Revise la informacion');
            return redirect()->back()->withInput();
        }

        $producto->update($id,$datos);

        $validacion=$this->validate([
            'imagen'=>[
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);
       if($validacion){

        if($imagen=$this->request->getFile('imagen')){
            $datosProducto=$producto->where('id',$id)->first();
            $ruta=('../public/uploads/'.$datosProducto['imagen']);
            unlink($ruta);


            $nuevoNombre= $imagen->getRandomName();
            $imagen->move('../public/uploads/',$nuevoNombre);
            $datos=[
                'imagen'=>$nuevoNombre
            ];
            $producto->update($id,$datos);

        }
       }
       return $this->response->redirect(site_url('/listar'));
    }
}