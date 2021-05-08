from django.db import models

class Sett_info(models.Model):
    title = models.CharField('Название сайта', max_length=100)
    desk = models.TextField('Описание', blank=True)
    photo = models.ImageField(verbose_name='Изображение', upload_to='med/products/%Y/%m/%d/', blank=True)
    created_at = models.DateTimeField(verbose_name='Дата создания',auto_now_add=True,null=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.title

    class Meta:
        verbose_name = 'Настройки' # в одном числе
        verbose_name_plural = 'Настройки'  # в многочисл
        ordering = ['-created_at']

class Stocks(models.Model):
    name = models.CharField('Название', max_length=100)
    desk = models.TextField('Описание', blank=True)
    photo = models.ImageField(verbose_name='Изображение', upload_to='med/products/%Y/%m/%d/', blank=True)
    publication = models.BooleanField(verbose_name='Опубликовано?', default=True)
    created_at = models.DateTimeField(verbose_name='Дата создания',auto_now_add=True,null=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = 'Акция' # в одном числе
        verbose_name_plural = 'Акции'  # в многочисл
        ordering = ['-created_at']

class Products(models.Model):
    name = models.CharField('Название', max_length=100)
    desk = models.TextField('Описание', blank=True)
    price = models.IntegerField('Оснавная цена')
    dop_price = models.IntegerField('Дополнительнная цена', blank=True, null=True)
    volume = models.FloatField('Обьем', default="", editable=True, blank=True, null=True)
    dop_volume = models.FloatField('Доп.Обьем', blank=True, null=True)
    photo = models.ImageField(verbose_name='Изображение',upload_to='products/%Y/%m/%d/', blank=True)
    categories = models.ForeignKey('Category', on_delete=models.PROTECT, null=True, verbose_name='Категория')
    type_menu = models.ForeignKey('Type_Menu', on_delete=models.PROTECT, null=True, verbose_name='Тип меню')
    publication = models.BooleanField(verbose_name='Опубликовано?', default=True)
    created_at = models.DateTimeField(verbose_name='Дата создания',auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = 'Продукты' # в одном числе
        verbose_name_plural = 'Продукты'  # в многочисл
        ordering = ['-created_at']

class Category(models.Model):
    title = models.CharField(max_length=150, db_index=True, verbose_name='Наименование категории')
    type_menu = models.ForeignKey('Type_Menu', on_delete=models.PROTECT, null=True, verbose_name='Тип меню')
    publication = models.BooleanField(verbose_name='Опубликовано?', default=True)
    created_at = models.DateTimeField(verbose_name='Дата создания',auto_now_add=True,null=True)
    updated_at = models.DateTimeField(auto_now=True)
    def __str__(self):
        return self.title
    class Meta:
        verbose_name = 'Категория' # в одном числе
        verbose_name_plural = 'Категории'  # в многочисл
        ordering = ['title']


class Type_Menu(models.Model):
    title = models.CharField(max_length=150, db_index=True, verbose_name='Тип Меню')
    publication = models.BooleanField(verbose_name='Опубликовано?', default=True)
    created_at = models.DateTimeField(verbose_name='Дата создания',auto_now_add=True,null=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return self.title
    class Meta:
        verbose_name = 'Тип Меню' # в одном числе
        verbose_name_plural = 'Тип Меню'  # в многочисл
        ordering = ['title']