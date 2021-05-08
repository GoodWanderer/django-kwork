import {getParam} from './service.js';

//let values = document.getElementById('value').value;
//console.log(typeof values);

//<script>
//<!--    data = {-->
//<!--      title: "{{ title }}",-->
//<!--      products: [ {% for product in products %} "{{product}}", {% endfor %} ],-->
//<!--      stocks: [ {% for stock in stocks %} "{{stock}}", {% endfor %} ],-->
//<!--      type_menu: [ {% for type in type_menu %} "{{type}}", {% endfor %} ],-->
//<!--      category: [ {% for cat in category %} "{{ cat }}", {% endfor %} ],-->
//<!--    };-->
//</script>

// Слайдер
const slides = document.querySelectorAll('.slider-home__slide'),
      body = document.querySelector('body'),
      popup = document.querySelector('.popup-slider'),

      popUpClose = popup.querySelector('.popup-slider__close'),
      popUpBtn = popup.querySelector('.popup-slider__btn'),

      popupBody = popup.querySelector('.popup-slider__body'),
      popupImg = popup.querySelector('img');

const renderSliders = async () => {
    const data = await getParam("menu_stocks");
    slides.forEach((slide, i) => {
        slide.innerHTML = `<div class='slider-home__img'><img src="${data[i].photo}" alt="${data[i].name}"></div>`
        slide.addEventListener('click', () => {
            popupImg.src = data[i].photo;
            popupBody.innerHTML = `
            <div class="popup-slider__title">${data[i].name}</div>
            <div class="popup-slider__text">${data[i].desk}</div>
            `;
            body.classList.add('_lock');
            popup.classList.add('_active');
        })
    })
}

popUpClose.addEventListener('click', () => {
    body.classList.remove('_lock');
    popup.classList.remove('_active');
    document.querySelector('.popup-slider').classList.add('_disActive');
    setTimeout(() => {
        document.querySelector('.popup-slider').classList.remove('_disActive');
    }, 500);
})

popUpBtn.addEventListener('click', () => {
    body.classList.remove('_lock');
    popup.classList.remove('_active');
    document.querySelector('.popup-slider').classList.add('_disActive');
    setTimeout(() => {
        document.querySelector('.popup-slider').classList.remove('_disActive');
    }, 500);
})

renderSliders();
