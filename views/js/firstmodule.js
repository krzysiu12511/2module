if(prestashop.firstmodule){
    var query = $.ajax({
        type: 'GET',
        url: prestashop.firstmodule.url,
        dataType: 'json',
        success: function (resp) {
            const wrapper = document.getElementById('firstmodule-wrapper');
            if(wrapper){
                wrapper.innerHTML = resp.htmlContent + resp.productListContent;
            }
        }
    });
}