import {getParam} from './service.js';

window.onload = function() {

const body = document.querySelector('body');

// Получить кол-во элементов
const pupupCount = document.querySelector('.pupup-count'),
      popupCheque = document.querySelector('.popup-slider-cheque'),
      popupChequeClose = document.querySelector('.popup-slider-cheque__close'),
      popupChequeClear = document.querySelector('.popup-slider-cheque__clear');

const pupupCountFunc = () => {
    const obj = JSON.parse(localStorage.getItem('info'));
    if (obj != null && Object.keys(obj).length != 0) {
        value = 0;
        for (var key in obj) {
            var value = value + obj[key];
        }
        document.querySelector('.pupup-count__num').textContent = value;
        pupupCount.classList.add('_active');
    } else {
        pupupCount.classList.remove('_active');
    }
}

const sumUpdate = (sum) => {
    document.querySelector('.popup-slider-cheque__sum .st2').textContent = `${Math.round(sum)} ₸`;
    document.querySelector('.popup-slider-cheque__service .st2').textContent = `${Math.round(sum * 0.1)} ₸`;
    document.querySelector('.popup-slider-cheque__total .st2').textContent = `${Math.round(sum * 1.1)} ₸`;

    if (sum == 0) {
        body.classList.remove('_lock');
        popupCheque.classList.remove('_active');
    }

}

pupupCount.addEventListener('click', async () => {

    let obj = JSON.parse(localStorage.getItem('info')),
          items = document.querySelector('.popup-slider-cheque__items');

    items.textContent = '';

    const data = await getParam("menu_products");

    let sum = 0;

    for (let key in obj) {

        data.forEach(itm => {
            if (itm.id == key) {
                const elem = document.createElement('div');
                elem.classList.add('popup-slider-cheque__item');
                elem.innerHTML = `

                            <div class="popup-slider-cheque__left">
                                <div class="popup-slider-cheque__title">${itm.name}</div>
                                <div class="popup-slider-cheque__change">
                                    <div class="popup-slider-cheque__minus">-</div>
                                    <input class="popup-slider-cheque__counter" type="text" value=${obj[key]} readonly>
                                    <div class="popup-slider-cheque__plus">+</div>
                                </div>
                                <div class="popup-slider-cheque__price">${itm.price} ₸</div>
                            </div>
                            <div class="popup-slider-cheque__right"><img src="/static/img/order/del.png" alt=""></div>

                `;
                items.append(elem);
                elem.querySelector('.popup-slider-cheque__right').addEventListener('click', () => {
                    const input = elem.querySelector('input');
                    sum -= (input.value * itm.price);
                    sumUpdate(sum);
                    elem.parentNode.removeChild(elem);
                    delete obj[key];
                    localStorage.setItem('info', JSON.stringify(obj));
                    pupupCountFunc();
                 })
                const input = elem.querySelector('input');
                sum += (input.value * itm.price);
                console.log(itm.price)

                elem.querySelector('.popup-slider-cheque__minus').addEventListener('click', () => {
                    const input = elem.querySelector('input');
                    if (obj[key] > 1) {
                        obj[key] -= 1;
                        sum -= itm.price;
                        sumUpdate(sum);
                        input.value = obj[key];
                        localStorage.setItem('info', JSON.stringify(obj));
                    }
                })

                elem.querySelector('.popup-slider-cheque__plus').addEventListener('click', () => {
                    const input = elem.querySelector('input');
                    obj[key] += 1;
                    sum += itm.price;
                    sumUpdate(sum);
                    input.value = obj[key];
                    localStorage.setItem('info', JSON.stringify(obj));
                })

        }})
    }

    sumUpdate(sum);

    body.classList.add('_lock');
    popupCheque.classList.add('_active');
})

popupChequeClose.addEventListener('click', () => {
    body.classList.remove('_lock');
    popupCheque.classList.remove('_active');
//    document.querySelector('.popup-slider-cart').classList.add('_disActive');
//    setTimeout(() => {
//        document.querySelector('.popup-slider-cart').classList.remove('_disActive');
//    }, 500);
    pupupCountFunc();
})

popupChequeClear.addEventListener('click', () => {
    body.classList.remove('_lock');
    popupCheque.classList.remove('_active');
    localStorage.removeItem('info');
//    document.querySelector('.popup-slider-cart').classList.add('_disActive');
//    setTimeout(() => {
//        document.querySelector('.popup-slider-cart').classList.remove('_disActive');
//    }, 500);
    pupupCountFunc();
})

// Меню
const menu = document.querySelector('.select-header'),
      menuActive = menu.querySelector('.select-header__item-on'),
      menuItemsFather = menu.querySelector('.select-header__body'),
      menuItems = menu.querySelectorAll('.select-item');

// Функциональности меню
menu.addEventListener('click', (e) => {
  e.stopPropagation()
   if (menuItemsFather.classList.contains('_active')) {
     menuItemsFather.classList.remove('_active');
   } else {
     menuItemsFather.classList.add('_active');
   }
})

menuItems.forEach((item) => {
  item.addEventListener('click', () => {
    menuActive.textContent = item.textContent;
    menuActive.setAttribute('num', item.getAttribute('num'))
    renderCategories();
    renderCarts();
  })
});

document.addEventListener('click', function(e) {
  if (menuItemsFather.classList.contains('_active') ) {
    menuItemsFather.classList.remove('_active');
  }
});

// Категории
const categories = document.querySelector('.category-home'),
      categoriesCart = document.querySelector('.body-home');

// Функциональности Категорий
const renderCategories = async () => {
    const data = await getParam("menu_category");

    categories.textContent = '';
    categoriesCart.textContent = '';

    data.forEach((item, i) => {
        if (item.type_menu == document.querySelector('.select-header__item-on').getAttribute('num')) {

            let elem = document.createElement('a');
            elem.classList.add('category-home__link');
            elem.setAttribute("href", `#${item.id}`);
            elem.textContent = item.title;
            categories.append(elem);

            let categor = document.createElement('div');
            categor.classList.add('body-home__category');
//            categor.classList.add('body-home__category');
            categor.setAttribute("id", item.id);
            categor.innerHTML = `
                <span class="body-home__title">${item.title}</span>
                <div class="body-home__carts"></div>
            `;
            categoriesCart.append(categor);

        }
    })
}

// Картиочки

const popup = document.querySelector('.popup-slider-cart'),

      popUpClose = popup.querySelector('.popup-slider-cart__close'),
      popUpBtn = popup.querySelector('.popup-slider-cart__btn'),

      popupBody = popup.querySelector('.popup-slider-cart__body'),
      popupImg = popup.querySelector('img'),

      spanAdd = popup.querySelector('.popup-slider-cart__add'),
      popupMinus = popup.querySelector('.popup-slider-cart__minus'),
      popupPlus = popup.querySelector('.popup-slider-cart__plus');

// Функциональности Карточек
const renderCarts = async () => {
    const data = await getParam("menu_products");

    data.forEach((item, i) => {
        const cat = document.getElementById(item.categories_id)
        let cart = document.createElement('div');
        cart.classList.add('body-home__cart');
        cart.classList.add('cart-body-home');
        cart.innerHTML = `
            <div class="cart-body-home__img"><img src="${item.photo}" alt=""></div>
            <div class="cart-body-home__info">
                <div class="cart-body-home__title">${item.name}</div>
                <div class="cart-body-home__text">${item.desk}</div>
                 <div class="cart-body-home__price">${item.price} ₸</div>
             </div>
        `;
        cart.addEventListener('click', () => {
            popupImg.src = data[i].photo;
            document.querySelector('.popup-slider-cart__title').textContent = item.name;
            document.querySelector('.popup-slider-cart__text').textContent = item.desk;
            document.querySelector('.popup-slider-cart__price').textContent = item.price;

            const input = popup.querySelector('input');

            let info = JSON.parse(localStorage.getItem("info"));

            spanAdd.querySelector('span').addEventListener('click', () => {
                if (info == null) {
                    info = {};
                }
                const key = item.id;
                info[key] = 1;
                input.value = 1;
                localStorage.setItem('info', JSON.stringify(info));
                spanAdd.classList.add('_on');
            })

            if (info != null && info.hasOwnProperty(item.id)) {
               const key = item.id;
               input.value = info[key];
               spanAdd.classList.add('_on');
            } else {
                spanAdd.classList.remove('_on');
            }

            popupMinus.addEventListener('click', () => {
                const key = item.id;
                info[key] -= 1;
                input.value = info[key];
                if (info[key] <= 0) {
                    spanAdd.classList.remove('_on');
                    delete info[key];
                }
                localStorage.setItem('info', JSON.stringify(info));
            })

            popupPlus.addEventListener('click', () => {
                const key = item.id;
                info[key] += 1;
                input.value = info[key];
                localStorage.setItem('info', JSON.stringify(info));
            })

            body.classList.add('_lock');
            popup.classList.add('_active');
        })
        if (cart != null && cat != null) {
            cat.append(cart);
        }
    })
}

popUpClose.addEventListener('click', () => {
    body.classList.remove('_lock');
    popup.classList.remove('_active');
    document.querySelector('.popup-slider-cart').classList.add('_disActive');
    setTimeout(() => {
        document.querySelector('.popup-slider-cart').classList.remove('_disActive');
    }, 500);
    pupupCountFunc ();
})

popUpBtn.addEventListener('click', () => {
    body.classList.remove('_lock');
    popup.classList.remove('_active');
    document.querySelector('.popup-slider-cart').classList.add('_disActive');
    setTimeout(() => {
        document.querySelector('.popup-slider-cart').classList.remove('_disActive');
    }, 500);
    pupupCountFunc ();
})

// Страрт
renderCategories().then(
    renderCarts()
).then(
    pupupCountFunc()
)

};