from django.shortcuts import render
from .models import Products, Stocks, Sett_info, Type_Menu, Category
import json
# def index(request):
#     return render(request,'menu/index.html')

def index(request):
    stocks = Stocks.objects.all()
    products = Products.objects.all()
    sett_info = Sett_info.objects.all()
    type_menu = Type_Menu.objects.all()[::-1]
    category = Category.objects.all()

    context = {
        'title': 'Мёд',
        'products': products,
        'stocks': stocks,
        'sett_info': sett_info,
        'type_menu': type_menu,
        'category': category,
    }

    print(context)

    return render(request, 'menu/med.html', context)


def biduin(request):
    return render(request,'menu/med.html')