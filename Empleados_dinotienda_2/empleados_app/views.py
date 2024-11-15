from django.shortcuts import render,redirect
from .models import Empleados
# Create your views here.

def inicio_vista(request):
    losempleados=Empleados.objects.all()

    return render(request,"gestionarEmpleados.html",{'misempleados':losempleados})

def registrarEmpleados(request):
    ide=request.POST["txtide"]
    nombre=request.POST["txtnombre"]
    apellido=request.POST["txtapellido"]
    sueldo=request.POST["txtsueldo"]
    celular=request.POST["txtcelular"]
    direccion=request.POST["txtdireccion"]
    sexo=request.POST["txtsexo"]
    guardarempleados=Empleados.objects.create(ide=ide,nombre=nombre,apellido=apellido,sueldo=sueldo,celular=celular,direccion=direccion,sexo=sexo)
    return redirect('/')