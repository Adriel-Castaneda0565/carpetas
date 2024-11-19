from django.shortcuts import render,redirect
from .models import Productos
# Create your views here.
def inicio_vista(request):
    losproductos=Productos.objects.all()

    return render(request, 'gestionarProductos.html', {'misproductos':losproductos})

def registrarProductos(request):
    id_prod=request.POST["txtid"]
    nombre=request.POST["txtnombre"]
    tipo=request.POST["txttipo"]
    id_prov=request.POST["txtpro"]
    cant=request.POST["txtcant"]
    precio=request.POST["txtpre"]
    desc=request.POST["txtdesc"]
    id_suc=request.POST["txtsuc"]
    guardarproductos=Productos.objects.create(id_prod=id_prod,nombre=nombre,tipo=tipo,id_prov=id_prov,cant=cant,precio=precio,desc=desc,id_suc=id_suc)
    return redirect('/')

def seleccionarProductos(request,id_prod):
    Producto=Productos.objects.get(id_prod=id_prod)
    return render(request,"editarProductos.html",{'misproductos':Producto})

def editarProductos(request):
    id_prod=request.POST["txtid"]
    nombre=request.POST["txtnombre"]
    tipo=request.POST["txttipo"]
    id_prov=request.POST["txtpro"]
    cant=request.POST["txtcant"]
    precio=request.POST["txtpre"]
    desc=request.POST["txtdesc"]
    id_suc=request.POST["txtsuc"]
    Producto=Productos.objects.get(id_prod=id_prod)
    Producto.id_prod=id_prod
    Producto.nombre=nombre
    Producto.tipo=tipo
    Producto.id_prov=id_prov
    Producto.cant=cant
    Producto.precio=precio
    Producto.desc=desc
    Producto.id_suc=id_suc
    
    Producto.save()
    return redirect("/")

def borrarProductos(request,id_prod):
    Producto=Productos.objects.get(id_prod=id_prod)
    Producto.delete()
    return redirect('/')