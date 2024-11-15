from django.shortcuts import render
from .models import Productos
# Create your views here.
def inicio_vista(request):
    losproductos=Productos.objects.all()
    return render(request, 'gestionarProductos.html', {'losproductos':losproductos})

def registearEmpleados(request):
    id_Prod=request.POST["txtid"]
    nombre=request.POST["txtnombre"]
    tipo=request.POST["txttipo"]