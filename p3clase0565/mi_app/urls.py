from django.urls import path
from mi_app import views
urlpatterns = [

    
    path('',views.index,name="index"),
    path('adri/',views.adri,name="adri"),
    path('minovia/',views.minovia,name="minovia"),

]