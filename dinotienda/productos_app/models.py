from django.db import models

# Create your models here.
class Productos(models.Model):
    id_prod=models.CharField(primary_key=True,max_length=6)
    nombre=models.CharField(max_length=50)
    tipo=models.CharField(max_length=60)
    id_prov=models.CharField(max_length=6)
    cant=models.IntegerField(default=0)
    precio=models.DecimalField(max_digits=5, decimal_places=2)
    desc=models.CharField(max_length=400)
    id_suc=models.CharField(max_length=6)

    def __str__(self):
        return self.nombre