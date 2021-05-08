# Generated by Django 3.2 on 2021-04-26 11:35

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('menu', '0001_initial'),
    ]

    operations = [
        migrations.AlterModelOptions(
            name='products',
            options={'ordering': ['-created_at'], 'verbose_name': 'Продукты', 'verbose_name_plural': 'Продукты'},
        ),
        migrations.AlterField(
            model_name='products',
            name='created_at',
            field=models.DateTimeField(auto_now_add=True, verbose_name='Дата создания'),
        ),
        migrations.AlterField(
            model_name='products',
            name='photo',
            field=models.ImageField(blank=True, upload_to='products/%Y/%m/%d/', verbose_name='Изображение'),
        ),
        migrations.AlterField(
            model_name='products',
            name='publication',
            field=models.BooleanField(default=True, verbose_name='Опубликовано?'),
        ),
    ]