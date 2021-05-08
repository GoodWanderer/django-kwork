from django.contrib import admin
from .models import Products, Category, Type_Menu, Stocks, Sett_info

class ProductsAdmin(admin.ModelAdmin):
    list_display = ('id', 'name', 'desk', 'categories', 'type_menu', 'price', 'created_at', 'publication')
    list_display_links = ('id', 'name')
    search_fields = ('name', 'desk')

class CategoryAdmin(admin.ModelAdmin):
    list_display = ('id', 'title')
    list_display_links = ('id', 'title')
    search_fields = ('title',)


class Type_MenuAdmin(admin.ModelAdmin):
    list_display = ('id', 'title')
    list_display_links = ('id', 'title')
    search_fields = ('title',)

class StocksAdmin(admin.ModelAdmin):
    list_display = ('name', 'desk', 'photo', 'created_at', 'publication')
    list_display_links = ('name',)
    search_fields = ('name',)

class Sett_infoAdmin(admin.ModelAdmin):
    list_display = ('title', 'photo', 'created_at')
    list_display_links = ('title',)
    search_fields = ('title',)

admin.site.register(Products, ProductsAdmin)
admin.site.register(Category, CategoryAdmin)
admin.site.register(Type_Menu, Type_MenuAdmin)
admin.site.register(Stocks, StocksAdmin)
admin.site.register(Sett_info, Sett_infoAdmin)
