$(document).ready(function () {
    let step = $('#step').val()
    let count = $('#count').val()
    let first = 0
    let addCityParams = composeAddCityParams(step, count, first)
    if(addCityParams !== false) {
        addCity(addCityParams)
    }

})
// отправляем ajax запрос для создания городов в количестве равном step
function addCity(data) {
    $.ajax({
        url: '/local/components/city/add.city/ajax/ajax.php',
        method: 'post',
        dataType: 'html',
        data: data,
        success: function(response) {
            $('#result').append(response)
            data.first = Number(data.step) + Number(data.first)
            let addCityParams = composeAddCityParams(data.step, data.count, data.first)
            if (addCityParams !== false) {
                addCity(addCityParams)
            }
        },
        error: function (error) {
            console.log(error)
        }
    })
}
// проверяем данные о шаге и общем количестве элементов
// чтобы не превысить COUNT
function composeAddCityParams(step, count, first) {
    if(Number(step) > Number(count) &&  Number(count) === 0) {
        step = count
    }
    let nextElements = Number(step) + Number(first)
    if(nextElements > Number(count)) {
        step = Number(count) - Number(first)
    }
    if(Number(first) === Number(count)) {
        return false
    }
    return {
        step: step,
        count: count,
        first: first,
        iblock: BX.message('iblock')
    }
}