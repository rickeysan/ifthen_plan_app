$(function(){
    $('#js-if-get-btn').on('click',function(){
        axios.get('/example/true')
        .then((response) => {
            $('#js-if-get-area').text(response.data.body);
        })
        .catch(() => {
        })
    })
    $('#js-then-get-btn').on('click',function(){
        axios.get('/example/false')
        .then((response) => {
            $('#js-then-get-area').text(response.data.body);
        })
        .catch(() => {
        })
    })
})
