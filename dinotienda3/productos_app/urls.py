from django.urls import path
from productos_app import views

urlpatterns = [
    path("",views.inicio_vista,name="inicio_vista"),
    path("registrarProductos/",views.registrarProductos,name="registrarProductos"),
    path("seleccionarProductos/<id_prod>",views.seleccionarProductos,name="seleccionarProductos"),
    path("editarProductos/",views.editarProductos,name="editarProductos"),
    path("borrarProductos/<id_prod>",views.borrarProductos,name="borrarProductos"),
]
