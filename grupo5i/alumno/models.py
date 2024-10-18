from django.db import models

# Create your models here.

class Alumno(models.Model):
    apaterno=models.CharField(max_length=50,verbose_name="Apellido Paterno")
    amaterno=models.CharField(max_length=50,verbose_name="Apellido Materno")
    nombre=models.CharField(max_length=100,verbose_name="Nombre(s)")
    fecha_nacimiento=models.DateField(verbose_name="Fecha de nacimiento",null=False,blank=False)
    fecha_ingreso=models.DateField(verbose_name="Fecha de ingreso",null=False,blank=False)

    class Meta:
        db_table="Alumnos"
        verbose_name="Alumno"
        verbose_name_plural="AlumnosXD"

    def __str__(self) -> str:
        return self.nombre

        
class Frase(models.Model):
    comentario=models.TextField(verbose_name="Comentario",max_length=400)
    alumno_fk=models.ForeignKey(Alumno,on_delete=models.CASCADE)

    class Meta:
        verbose_name="Frase"
        verbose_name_plural="Frases"