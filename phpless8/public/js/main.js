$(function() {

    // ТОВАРЫ

    $('#goodsList').each(function() {
        // Привяжем контекст к форме
        var $form = $(this);
        // Установим свой обработчик на нажатие кнопки
        $form.on('submit', '.goodUnit', function(event) {
            event.preventDefault();
            // Получим значение ИД товара
            var $inputId = $(event.target).find('input[name = "id"]');
            var id = $inputId.val();

            $.ajax({
                'url': '/addToCartAJAX',
                'method': 'post',
                'data': {
                    id: id
                },
                success: function(data) {
                    //Обновляем корзину
                    var newCart = data.newCart;
                    $('#cart').html(newCart);
                },
                error: function() {
                    console.log('Товар с ид = ', id, ' не был добавлен в корзину.');
                }
            });
        })
    });

    // КОРЗИНА

    $('#cart').each(function() {
        var $orderForm = $(this);

        $orderForm.on('submit', '.cartUnit', function(event) {
            event.preventDefault();
            // Получим ИД заказа
            var $inputId = $(event.target).find('input[name = "id"]');
            var id = $inputId.val();

            $.ajax({
                'url': '/deleteFromCartAJAX',
                'method': 'post',
                'data': {
                    id: id
                },
                success: function(data) {
                    //Обновим корзину
                    newCart = data.newCart;
                    $('#cart').html(newCart);
                },
                error: function() {
                    console.log('Товар не был удален');
                }
            });
        })
    })

    // ЗАКАЗЫ

    $('#ordersList').each(function() {
        var $orderForm = $(this);

        $orderForm.on('submit', '.formOrdersList', function(event) {
            event.preventDefault();
            // Получим ИД заказа
            var $inputId = $(event.target).find('input[name = "order_id"]');
            var id = $inputId.val();

            $.ajax({
                'url': '/deleteOrderAJAX',
                'method': 'post',
                'data': {
                    id: id
                },
                success: function(data) {
                    //Обновляем список заказов
                    newOrderList = data.newOrderList;
                    $('#ordersList').html(newOrderList);
                },
                error: function() {
                    console.log('Заказ не был удален');
                }
            });
        })
    })



});