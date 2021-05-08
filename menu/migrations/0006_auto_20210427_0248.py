# Generated by Django 3.2 on 2021-04-26 20:48

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('menu', '0005_auto_20210427_0238'),
    ]

    operations = [
        migrations.CreateModel(
            name='Type_Menu',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('title', models.CharField(db_index=True, max_length=150, verbose_name='Тип Меню')),
            ],
            options={
                'verbose_name': 'Тип Меню',
                'verbose_name_plural': 'Тип Меню',
                'ordering': ['title'],
            },
        ),
        migrations.AddField(
            model_name='category',
            name='type_menu',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.PROTECT, to='menu.type_menu'),
        ),
    ]