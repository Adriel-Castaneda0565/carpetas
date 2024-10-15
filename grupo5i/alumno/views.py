from django.shortcuts import render

# Create your views here.

def index_vista(request):
    return render(request,'index.html')
