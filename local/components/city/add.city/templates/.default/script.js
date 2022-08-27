$(document).ready(function () {
    let step = $('#step').val()
    let count = $('#count').val()
    let first = 0
    let addCityParams = composerAddCityParams(step, count, first)
    console.log(addCityParams)

    if(addCityParams !== false) {
        addCity(
            addCityParams.step,
            addCityParams.count,
            addCityParams.first
        )
    }

})
function addCity(step, count, first) {
    $.ajax({
        url: '/local/components/city/add.city/ajax/ajax.php',
        method: 'post',
        dataType: 'html',
        data: {step:step, count:count, first:first},
        success: function(response) {
            $('#result').append(response)
            first = Number(step) + Number(first)
            let addCityParams = composerAddCityParams(step, count, first)
            console.log(addCityParams)
            if (addCityParams !== false) {
                addCity(
                    addCityParams.step,
                    addCityParams.count,
                    addCityParams.first
                )
            }
        },
        error: function (error) {
            console.log(error)
        }
    })
}
function composerAddCityParams(step, count, first) {
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
    }
}