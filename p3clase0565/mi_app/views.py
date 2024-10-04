from django.shortcuts import render
from django.http import HttpResponse
# Create your views here.

def index(request):
    return HttpResponse("Hola soy Adriel Castaneda")

def adri(request):
    return HttpResponse("io sono adri django jajaja🦎")

def minovia(request):
    return HttpResponse("On tas Melany🐉")