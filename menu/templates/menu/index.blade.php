<?php

$host = 'srv-pleskdb53.ps.kz';          //Хост
$db = 'filling1_fillin-group.kz';               //Имя БД
$user = 'filling1_admin';       //Имя пользователя БД
$pass = 'Aif60?y8';          //Пароль пользователя БД
$charset='cp1251';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = array(
	PDO::ATTR_ERRMODE     			=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE	=>PDO::FETCH_ASSOC
	);
	
$pdo = new PDO($dsn, $user, $pass, $opt); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Мёд') }}</title>	
<meta name="HandheldFriendly" content="true">
<link rel="icon" type="image/x-icon" href="images/med/favicon.ico">
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" type="text/css" href="/css/template-default-general.css">
<link rel="stylesheet" type="text/css" href="/css/template-default.min.css">
<link rel="stylesheet" type="text/css" href="/css/template-default-overwrites.css">
<style>
body{background:#fffbdb}.header{background:#fffbdb}.category{background-color:#fffbdb}.category__item{font-size:14px;color:#2a3f59;font-weight:500;border:1px solid #2a3f59}.category__item:hover,.category__item:focus,.category__item.is-active{border-color:#2a3f59;background-color:#2a3f59;color:#fff}.product-list__price,.product-list__price-old{font-size:16px;color:#2a3f59;font-weight:500}.product-list__item{border-bottom:1px solid #E5E5E5}

</style>    
</head>
  <body>   
<div class="app" data-sticky-container>
 <header class="header">
<a href="#" class="logo-org" title="logo" id="logo-link">          
<img src="{{asset('images/med/med_logo.png')}}">          
</a>
<div id="dropdown-sections-header" class="header__category dropdown">
</div>
 </header>
 <div class="app__main">
 <div class="entry-slider">
<div class="swiper-container js-entry-slider">
<div class="swiper-wrapper">  
<?php
 $stmt = $pdo->prepare("SELECT img,id FROM med_stocks WHERE publication='1'");
$stmt->execute();	
$result = $stmt->fetchAll();
foreach($result as $row )
{
?> 	

		  
<div class="swiper-slide page" data-ids="<?php echo $row['id'];?>">
<div class="entry-slider__item" style="height: 250px;">

<img  src="/storage/app/public/<?php echo $row['img'];?>" class="entry-slider__img" alt="">
</div>
</div> 
<?php              
}
?>  
 </div>
 </div>
<div class="entry-slider__pagination js-entry-slider-pagination"></div>
 </div>
 <?php
 $stmt = $pdo->prepare("SELECT img,id,desk,name FROM med_stocks WHERE publication='1'");
$stmt->execute();	
$result = $stmt->fetchAll();
foreach($result as $row )
{
?> 
<div id="mod_<?php echo $row['id'];?>" style="display: none;position: fixed;
    margin: 0 auto;
    top: 0px;
    z-index: 9999;
    left: 0;" class="modal-dialog modal-dialog-full-width page" role="document" data-ids="<?php echo $row['id'];?>">
      <div class="modal-content">
        <div class="modal-product__close" data-dismiss="modal"></div>
        <img class="modal-product__img" alt="" src="/storage/app/public/<?php echo $row['img'];?>"><!---0.746180%-->
        <div class="modal-body pb-5">
          <div class="product-list">
            <div class="product-list__item  ">
              <div class="product-list__desc">
                <div class="product-list__title"><?php echo $row['name'];?><!---0.746180%--></div>
                <div class="product-list__text"><?php echo $row['desk'];?><!---0.746180%--></div>
                <div class="product-list__tags">
                  <!---0.746180%-->
                </div>

<div class="product-list__type">
<div class="product-list__type-item">
<div class="product-list__type-title"><!---0.746180%--></div>
<!---0.746180%-->
</div>
<!---0.746180%-->
              </div>              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button style="color: #fff;border: 0;position: fixed;bottom: 0;left: 0;
    right: 0;
    background-color: #f2994a;
    font-size: 18px;
    border: 0;
    width: 100%;
    height: 52px;
    outline: 0!important;
    border-radius: 0;" type="button" class="button modal-button" data-dismiss="modal">
 Продолжить<!---0.746180%-->
 </button>
 </div>
 </div>
    </div>
  </div>
	
<?php              
}			?>
        <div id="categories-sticky" class="category" data-margin-top="65" data-sticky-class="sticked">
        </div>
        <div id="main-price-list">
        </div>
      </div>
    </div>
    <div id="float-button-div">
    </div>
 <noindex>      
      <div id="modal-checkout" class="modal modal-checkout fade" tabindex="-1" role="dialog">
      </div>
 <div id="modal-product" class="modal modal-product fade" tabindex="-1" role="dialog">
      </div>
      <div id="modal-lang" class="modal fade" tabindex="-1" role="dialog">
      </div>     
      <div id="modal-order" class="modal modal-order fade" tabindex="-1" role="dialog">
      </div>            
      <div class="modal fade" id="modal-success">
      </div>      
    </noindex>
    <script type="text/javascript" id="init-data-script" charset="UTF-8">
     const $currencies = {"AED":{"symbol":"AED","on_left":true,"joined":true},"AZN":{"symbol":"₼","on_left":false,"joined":false},"EUR":{"symbol":"€","on_left":true,"joined":true},"GBP":{"symbol":"£","on_left":true,"joined":true},"KZT":{"symbol":"₸","on_left":false,"joined":false},"MYR":{"symbol":"RM","on_left":true,"joined":true},"RUB":{"symbol":"₽","on_left":false,"joined":false},"TRY":{"symbol":"₺","on_left":true,"joined":true},"USD":{"symbol":"$","on_left":true,"joined":true}};
    const $langsNative = {"AZ":"Az?rbaycan","CH":"??","EN":"English","KZ":"?аза?ша","RU":"Русский","TR":"T?rk?e"};
      const $txts = {"EN":{"AZ":"azerbaijan","CH":"chinese","EN":"english","KZ":"kazakh","RU":"russian","TR":"turkish","add":"Add","add_addit_price":"Add additional price","add_category":"Add category","add_client":"Add client","add_order_failed":"Order wasn't created","add_order_failure_message":"Error occurred while trying to create order. Please, try again later.","add_order_succeeded":"Order was created","add_order_success_message":"Thank you! Our manager will contact you soon","add_row":"Add item","add_section":"Add section","add_slide":"Add slide","additional_langs":"Additional Languages","admin_panel":"Admin panel","all_total":"Total","amount":"Amount","analytics":"Analytics","analytics_not_ready_desc":"Analytics will be available soon!","apply":"Apply","approve":"Approve","at_place":"At place","back":"Back","bad_format_error":"Bad format of entered data","cabinet":"Cabinet","can_use_subdomain":"Can use subdomain","cancel":"Cancel","category_added":"Category was added","category_deleted":"Category was deleted","category_desc":"Category description","category_edited":"Category was edited","category_name":"Category name","change":"Change","changes_saved":"Changes saved","choose_language":"Choose language","clear":"Clear","clear_basket":"Clear basket","client_added":"Client was added","client_error":"Error on sending data","client_orders":"Client orders","clients":"Clients","close":"Close","co_module_available":"Module \"Client Orders\" is available","co_module_is_off":"\"Client orders\" is off","co_module_is_on":"\"Client orders\" is on","comment_for_order":"Comment for order","contacts":"Contacts","continue":"Continue","cost":"Cost","creation_date":"Created at","default_menu_lang":"Default language of menu","delete":"Delete","delivery":"Delivery","delivery_address":"Delivery address","delivery_comment":"Comment for delivery","delivery_desc":"We will deliver to your house","delivery_desc_note":"Note about shipping","delivery_type":"Delivery type","download_qr":"Download QR","download_qr_at_place":"QR for using at place","download_qr_for_order":"QR for online orders","download_qr_hybrid":"QR for orders at place","email":"Email","empty":"empty","enter_address":"Enter address","enter_email":"Enter email","enter_login":"Enter login","enter_name":"Enter name","enter_tags":"Enter tags","enter_w_commas":"Separate usernames with commas","enter_your_text":"Enter your text","error":"Error","error_occured":"Error occurred, please contact support","error_user_is_blocked":"User account is blocked","exit":"Exit","failure_payment":"Payment wasn't received or was aborted","file_invalid":"File must be less than 10MB image","full_desc":"Full description","general_error":"Error occurred, please contact support","home_address":"Home address","invalid-file-extension":"Invalid file extension","is_paid":"Paid","is_unpaid":"Unpaid","is_unset":"is unset","item_name":"Item name","last_login_date":"Last login at","last_publish_date":"Last published at","list_link_name":"Price list name for link","login":"Login","login_not_unique":"Login is not unique","login_psw_incorrect":"Login or password is incorrect","main_menu":"Main menu","make_order":"Make an order","make_order_whatsapp":"Make an order","making_order":"Making order","menu_currency":"Currency of menu","menu_lang":"Menu language","menus":"Menus","module_in_progress":"The module is WIP","module_not_available":"The module is not available to you","name":"Name","new_client":"New client","no":"No","no_stock":"Out of stock","old_price":"Old price","only_delivery":"Only delivery","only_self_pickup":"Only self-pickup","order_btn":"Make an order","order_w_number":"Order number","orders_na_desc":"You can change your price plan to get access to client orders","org":"Organization","org_address":"Organization address","org_icon":"Organization icon","org_logo":"Organization logo","org_name":"Organization name","other_address":"Appartment number / floor / etc","payment":"Payment","payment_after_delivery":"Pay after delivery","payment_card":"Pay via card","payment_method":"Payment method","percents_for_service":"% commision","phone":"Phone","positions":"Positions","price":"Price","price_label":"Price label","price_list_is_dirty":"You have unpublished changes","price_list_published":"Menu was published!","profile":"Profile","publish_price_list":"Publish","q_delete_category":"Delete category?","q_delete_item":"Delete item?","q_delete_section":"Delete section?","q_delete_slide":"Delete slide?","q_link_list":"Your QR codes must be reprinted after changing link name. Are you sure you want to change link name?","q_publish_price_list":"Publish menu? New menu will be available to. your customers","q_send_subdomain":"Your QR codes must be reprinted after changing subdomain. Are you sure you want to change subdomain?","req_fields_not_filled":"Required field wasn't filled","required_field":"Required field","room_number":"Room number","row":"Item","row_added":"Item was added","row_deleted":"Item was deleted","row_edited":"Item was edited","row_turned_off":"Item was turned off","row_turned_on":"Item was turned on","save":"Save","save_domain":"Save subdomain","save_link":"Save link","section_added":"Section was added","section_deleted":"Section was deleted","section_desc":"Section description","section_edited":"Section was edited","section_img":"Section img","section_name":"Section name","self_pickup":"Self pickup","self_pickup_and_delivery":"Self-pickup and delivery","self_pickup_desc":"We will prepare your order for you to pick up","settings":"Settings","sh_last_time":"last time","sh_turned_off":"off","short_desc":"Short description","show_list":"Show list","slide_added":"Slide was added","slide_deleted":"Slide was deleted","slide_updated":"Slide was edited","slider":"Slider","sort":"Sort","sorting_saved":"Sorting was saved","subdomain":"Enter subdomain","subdomain_exists_error":"There already exists subdomain with this name","successful_payment":"Successful payment received","table_number":"Table number","tags":"Tag","telegram_usernames":"Telegram usernames","time_needed_for_subdomain":"It can take some time for subdomain to change","tmp_psw_was_changed":"Password is changed?","to_menus":"To menus","to_rooms":"Into room","to_sections":"To sections","to_spa_center":"Into spa-center","total":"Total","total_summ":"Total sum","try_to_refresh_page":"Error, try refreshing page","turn_off":"Turn off","turn_on":"Turn on","turn_on_co":"Turn on \"Client Orders\"","ui_lang":"UI language","upload":"Upload","upload_icon":"Upload icon","upload_image":"Upload image","yes":"Yes","your_order":"Your order","your_order_hint":"Show your order to waiter"},"RU":{"AZ":"азербайджанский","CH":"китайский","EN":"английский","KZ":"казахский","RU":"русский","TR":"турецкий","add":"Добавить","add_addit_price":"Добавить дополн.цену","add_category":"Добавить категорию","add_client":"Добавить клиента","add_order_failed":"Заказ не оформлен","add_order_failure_message":"Возникла ошибка при попытке создать заказ. Попробуйте еще раз через некоторое время","add_order_succeeded":"Заказ оформлен","add_order_success_message":"Спасибо! Наши менеджеры свяжутся с вами в ближайшее время","add_row":"Добавить позицию","add_section":"Добавить раздел","add_slide":"Добавить слайд","additional_langs":"Доп. языки","admin_panel":"Админка","all_total":"всего","amount":"Количество","analytics":"Аналитика","analytics_not_ready_desc":"Аналитика по вашим меню будет доступна совсем скоро!","apply":"Применить","approve":"Подтвердить","at_place":"В помещении","back":"Назад","bad_format_error":"Неправильный формат введеных данных","cabinet":"Кабинет","can_use_subdomain":"Субдомен доступен","cancel":"Отмена","category_added":"Категория добавлена","category_deleted":"Категория удалена","category_desc":"Описание категории","category_edited":"Категория отредактирована","category_name":"Название категории","change":"Сменить","changes_saved":"Изменения сохранены","choose_language":"Выберите язык","clear":"Очистить","clear_basket":"Очистить корзину","client_added":"Клиент добавлен","client_error":"Ошибка при отправке данных","client_orders":"Заказы","clients":"Клиенты","close":"Закрыть","co_module_available":"Модуль \"Заказы\" доступен","co_module_is_off":"Модуль \"Заказы\" отключен","co_module_is_on":"Модуль \"Заказы\" включен","comment_for_order":"Комментарий к заказу","contacts":"Контакты","continue":"Продолжить","cost":"Стоимость","creation_date":"Дата создания","default_menu_lang":"Основной язык меню","delete":"Удалить","delivery":"Доставка","delivery_address":"Адрес доставки","delivery_comment":"Комментарий по доставке","delivery_desc":"Наш курьер доставит вам до дома","delivery_desc_note":"Заметка по доставке","delivery_type":"Тип доставки","download_qr":"Скачать QR-код","download_qr_at_place":"QR внутри помещения","download_qr_for_order":"QR для заказов","download_qr_hybrid":"QR для заказов внутри помещения","email":"Email","empty":"пусто","enter_address":"Введите адрес","enter_email":"Введите email","enter_login":"Введите логин","enter_name":"Введите название","enter_tags":"введите через enter тэги","enter_w_commas":"Введите через запятую","enter_your_text":"Введите свой текст","error":"Ошибка","error_occured":"Возникла критическая ошибка обратитесь к администратору системы","error_user_is_blocked":"Пользователь заблокирован","exit":"Выйти","failure_payment":"Оплата заказа не прошла или была отменена","file_invalid":"Файл должен быть картинкой и размером не более 10 МБ","full_desc":"Подробное описание","general_error":"Возникла ошибка пожалуйста свяжитесь со службой поддержки","home_address":"Адрес дома","invalid-file-extension":"Неправильное расширение исходного файла","is_paid":"Оплачен","is_unpaid":"Не оплачен","is_unset":"не указано","item_name":"Название позиции","last_login_date":"Дата прошлого входа","last_publish_date":"Посл.публикация","list_link_name":"Название меню для ссылки","login":"Логин","login_not_unique":"Уже есть пользователь с таким логином","login_psw_incorrect":"Неправильный логин или пароль","main_menu":"Основное меню","make_order":"Заказать","make_order_whatsapp":"Заказать в Whatsapp","making_order":"Оформление заказа","menu_currency":"Валюта меню","menu_lang":"Язык меню","menus":"Меню","module_in_progress":"Данный модуль находится в разработке","module_not_available":"Данный модуль недоступен вашему тарифу","name":"Имя","new_client":"Новый клиент","no":"Нет","no_stock":"Нет в наличии","old_price":"Перечерк. цена","only_delivery":"Только доставка","only_self_pickup":"Только самовывоз","order_btn":"Заказать","order_w_number":"Заказ №","orders_na_desc":"Вы можете поменять тариф чтобы получить доступ к заказам по вашим меню","org":"Заведение","org_address":"Адрес заведения","org_icon":"Иконка заведения","org_logo":"Логотип заведения","org_name":"Название заведения","other_address":"Номер квартиры / подъезд / этаж / другое","payment":"Оплата","payment_after_delivery":"Оплата при доставке","payment_card":"Оплата картой","payment_method":"Способ оплаты","percents_for_service":"% за обслуживание","phone":"Телефон","positions":"Позиции","price":"Цена","price_label":"Надпись возле цены","price_list_is_dirty":"Есть изменения","price_list_published":"Меню опубликовано!","profile":"Профиль","publish_price_list":"Опубликовать","q_delete_category":"Удалить категорию?","q_delete_item":"Удалить позицию?","q_delete_section":"Удалить раздел?","q_delete_slide":"Удалить слайд?","q_link_list":"При смене идентификатора ссылки на меню придется перепечатать qr-коды действительно хотите его сменить?","q_publish_price_list":"Опубликовать меню? Новое меню будет доступно для ваших клиентов","q_send_subdomain":"При смене субдомена придется перепечатать qr-коды действительно хотите его сменить?","req_fields_not_filled":"Не заполнены обязательные поля","required_field":"Обязательное поле","room_number":"Номер комнаты","row":"Позиция","row_added":"Позиция добавлена","row_deleted":"Позиция удалена","row_edited":"Позиция отредактирована","row_turned_off":"Позиция отключена","row_turned_on":"Позиция включена","save":"Сохранить","save_domain":"Сохранить субдомен","save_link":"Сохранить ссылку","section_added":"Раздел добавлен","section_deleted":"Раздел удален","section_desc":"Описание раздела","section_edited":"Раздел отредактирован","section_img":"Картинка раздела","section_name":"Название раздела","self_pickup":"Самовывоз","self_pickup_and_delivery":"Самовывоз и доставка","self_pickup_desc":"Мы вам приготовим, вы заберете","settings":"Настройки","sh_last_time":"посл.раз","sh_turned_off":"откл.","short_desc":"Краткое описание","show_list":"Посмотреть список","slide_added":"Слайд добавлен","slide_deleted":"Слайд удален","slide_updated":"Слайд отредактирован","slider":"Слайдер","sort":"Сортировать","sorting_saved":"Сортировка сохранена","subdomain":"Укажите субдомен","subdomain_exists_error":"Уже есть такой субдомен","successful_payment":"Успешная оплата заказа","table_number":"Номер стола","tags":"Тэги","telegram_usernames":"Имена пользователей telegram","time_needed_for_subdomain":"На изменение субдомена может потребоваться время","tmp_psw_was_changed":"Сменил пароль?","to_menus":"К меню","to_rooms":"В комнату","to_sections":"К разделам","to_spa_center":"В спа-центр","total":"всего","total_summ":"Итоговая сумма","try_to_refresh_page":"Ошибка, попробуйте перезагрузить страницу","turn_off":"Отключить","turn_on":"Включить","turn_on_co":"Включить модуль \"Заказы\"","ui_lang":"Язык интерфейса","upload":"Загрузить","upload_icon":"Загрузите иконку","upload_image":"Загрузите картинку","yes":"Да","your_order":"Ваш заказ","your_order_hint":"Покажите или озвучьте ваш заказ официанту"}};    
	 const $pl = {"currency_code":"KZT","default_lang":"RU",
	 "sections":[<?php

$stmt = $pdo->prepare("SELECT name,id FROM group_menus");
$stmt->execute();	
$result = $stmt->fetchAll();
if(count($result)){
foreach($result as $row )
{
	$getnum=$row['id'];
	
echo '{"price_list_section":{
	"id":"'.$row['id'].'",
	"section_name":{"RU":"'.$row['name'].'"}},
	"price_list_categories":[';	
$stmt1 = $pdo->prepare("SELECT name, id FROM categories WHERE type_menu=:gtn AND publication=1");
$stmt1->execute(array(':gtn'=>$getnum));	
$result1 = $stmt1->fetchAll();

if(count($result1)){
foreach($result1 as $row1)
{
	$getnum1=$row1['id'];
echo '{"price_list_category":{"id":"'.$row1['id'].'",	
	"category_name":{"RU":"'.$row1['name'].'"}},
	"price_list_items":[';

$stmt2 = $pdo->prepare("SELECT name, id, price,desk,img FROM products WHERE categories=:gtn AND publication=1");
$stmt2->execute(array(':gtn'=>$getnum1));	
$result2 = $stmt2->fetchAll();


if(count($result2)){
foreach($result2 as $row2)
{
$desk = preg_replace("/[\r\n]+/", "\\n",  $row2["desk"]);
$desk2 = mb_substr($desk, 0, 150); 
 echo	'{"id":"'.$row2['id'].'",
	"item_name":{"RU":"'.$row2['name'].'"},
	"short_desc":{"RU":"'.$desk2.'"},
	"description":{"RU":"'.$desk.'"},
	"main_image":"'.$row2['img'].'",
	"images":null,
      "tags":{},
	"main_price":'.$row2['price'].',
"main_old_price":0,
	"main_label":{},
	"add_price_tuples":null},';
}
  }
echo ']},';
}}
echo ']},';
}}$pdo=null;?>],
"client_order_is_on":false,"client_order_delivery_desc":null,"avail_delivery_type":0,"whatsapp_phone":"","whatsapp_is_on":false,"style_template":"","style_items_display":"","default_pl_type":0,"payments_is_on":false,"avail_payment_types":null};
	
    </script>	
 <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/main.min.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    <script type="text/javascript" src="/js/lodash.min.js"></script>
    <script type="text/javascript" src="/js/lighterhtml.min.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
    <script type="text/javascript" src="/js/i18n_resources.js"></script>
    <script type="text/javascript" src="/js/sticky.min.js"></script>    
    <script type="text/javascript" src="/js/pl-scripts.js"></script>
		<script>
			 $("body").on("click", ".page", function () {
				 var ids =$(this).data("ids");
			 $('#mod_'+ids).slideToggle();
	return false;			
    });		
</script>
</body>
</html>