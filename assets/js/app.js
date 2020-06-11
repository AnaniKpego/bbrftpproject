
import '../css/app.css';



console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

import noUiSlider from 'nouislider'
import 'nouislider/distribute/nouislider.css'

const slider = document.getElementById('week-price');

if (slider){
    const minWeekPrice = document.getElementById('search_data_minWeekPrice')
    const minValue = Math.floor(parseInt(slider.dataset.min,10)/10)*10
    const maxValue = Math.floor(parseInt(slider.dataset.max,10)/10)*10
    const maxWeekPrice = document.getElementById('search_data_maxWeekPrice')

    const range = noUiSlider.create(slider, {
        start: [
            minWeekPrice.value || minValue,
            maxWeekPrice.value|| maxValue
        ],
        connect: true,
        step: 10,
        range: {
            'min': minValue ,
            'max': maxValue
        }
    })


    range.on('slide', function (values, handle) {

        if (handle === 0){
            minWeekPrice.value = Math.round(values[0])
        }
        if (handle === 1){
            maxWeekPrice.value = Math.round(values[1])
        }
        console.log(values, handle)
    })
};

const weekendSlider = document.getElementById('weekend-price')

if (weekendSlider){

    const minWeekendPrice = document.getElementById('search_data_minWeekendPrice')
    const minValue = Math.floor(parseInt(weekendSlider.dataset.min,10)/10)*10
    const maxValue = Math.floor(parseInt(weekendSlider.dataset.max,10)/10)*10
    const maxWeekendPrice = document.getElementById('search_data_maxWeekendPrice')

    const range = noUiSlider.create(weekendSlider, {
        start: [
            minWeekendPrice.value || minValue,
            maxWeekendPrice.value|| maxValue
        ],
        connect: true,
        step: 10,
        range: {
            'min': minValue ,
            'max': maxValue
        }
    })


    range.on('slide', function (values, handle) {

        if (handle === 0){
            minWeekendPrice.value = Math.round(values[0])
        }
        if (handle === 1){
            maxWeekendPrice.value = Math.round(values[1])
        }
        console.log(values, handle)
    })

}

