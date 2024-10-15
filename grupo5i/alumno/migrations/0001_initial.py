# Generated by Django 5.1.1 on 2024-10-15 17:24

import django.db.models.deletion
from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Alumno',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('Apaterno', models.CharField(max_length=50, verbose_name='Apellido Paterno')),
                ('Amaterno', models.CharField(max_length=50, verbose_name='Apellido Materno')),
                ('nombre', models.CharField(max_length=100, verbose_name='Nombre(s)')),
                ('fecha_nacimiento', models.DateField(verbose_name='Fecha de nacimiento')),
                ('fecha_ingreso', models.DateField(verbose_name='Fecha de ingreso')),
            ],
        ),
        migrations.CreateModel(
            name='Frase',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('comentario', models.TextField(max_length=400, verbose_name='Comentario')),
                ('Alumno_fk', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='alumno.alumno')),
            ],
        ),
    ]
