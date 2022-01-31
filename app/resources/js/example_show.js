$(function(){
    console.log('example_showです');
    $('#js-if-get-btn').on('click',function(){
        console.log('ifクリックされました');
        axios.get('/example/true')
        .then((response) => {
            console.log('通信に成功しました');
            console.log('responseの中身');
            console.log(response.data);
            $('#js-if-get-area').text(response.data.body);
        })
        .catch(() => {
            console.log('通信に失敗しました');
        })
    })
    $('#js-then-get-btn').on('click',function(){
        console.log('thenクリックされました');
        axios.get('/example/false')
        .then((response) => {
            console.log('通信に成功しました');
            console.log('responseの中身');
            console.log(response.data);
            $('#js-then-get-area').text(response.data.body);
        })
        .catch(() => {
            console.log('通信に失敗しました');
        })
    })
})
