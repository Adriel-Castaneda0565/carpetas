from django.urls import path
from productos_app import views

urlpatterns = [
    path("",views.inicio_vista,name="inicio_vista"),
    path("registrarProductos/",views.registrarProductos,name="registrarProductos"),
    path("seleccionarProductos/<ide>",views.seleccionarProductos,name="seleccionarProductos"),
    path("editarProductos/",views.registrarProductos,name="editarProductos"),
    path("borrarProductos/<ide>",views.borrarProductos,name="borrarProductos"),
]
