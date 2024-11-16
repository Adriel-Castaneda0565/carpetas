from django.db import models

# Create your models here.
class Empleados(models.Model):
    ide=models.CharField(primary_key=True,max_length=6)
    nombre=models.CharField(max_length=100)
    apellido=models.CharField(max_length=100)
    sueldo=models.CharField(max_length=50)
    celular=models.CharField(max_length=40)
    direccion=models.CharField(max_length=30)
    sexo=models.CharField(max_length=30)

    def __str__(self):
        return self.nombre
    
