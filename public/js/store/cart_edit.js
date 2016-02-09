$('#form_edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var itemId = button.data('item_id') // Extract info from data-* attributes
    $('#id_product').val(itemId);//id de produto editado
    var itemName = button.data('item_name') // Extract info from data-* attributes
    var itemPrice = button.data('item_price') // Extract info from data-* attributes
    var itemQtd = button.data('item_qtd') // Extract info from data-* attributes
    var total = parseFloat(itemPrice) * parseInt(itemQtd);
    var modal = $(this)
    //modal.find('.modal-title').text(itemName);
    modal.find('#edit_name').text(itemName);
    modal.find('#edit_price').text(itemPrice);
    modal.find('#edit_qtd').val(itemQtd);
    modal.find('#edit_price_total').text(total);


})

$('#edit_qtd').on('change', function(){
    var qtd = $(this).val();
    var price = $('#edit_price').text();
    var total = (parseFloat(price) * parseInt(qtd)).toFixed(2);
    $('#edit_price_total').text(total);

})

$('#btConfirm').on('click', function(){
    var id = $('#id_product').val();
    var qtd =$('#edit_qtd').val();
    if (qtd < 0)
        return false;
    $('#form_edit').modal('hide');
    var url = $(this).attr('url');
    url = url.replace('-1',id);
    url = url.replace('-2', qtd);
//    console.log(url );
    location.href = url;

});