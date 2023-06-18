import $ from 'jquery';
import CryptoJS from 'crypto-js';


class MyLicenceKey {
    constructor() {
        this.events();
    }

    events() {
        $(".generate-key").on("click", this.generateKey.bind(this));
        $('#reload').on('click', this.reloadPage.bind(this));
        $('.copy_to_clipboard').on('click', this.copyToClipBoard.bind(this));
    }

    //METHOD
    generateKey() {
        function createToken(buyerID, variationProduct, orderID) {
            const data = buyerID + variationProduct + orderID;
            const hash = CryptoJS.SHA256(data);
            const token = hash.toString();

            return token;
        }


        const activation_total = $(".activation_total").val();
        const buyer_id = $(".buyer_id").val();
        const order_id = $(".order_id").val();


        const token = createToken(buyer_id, activation_total, order_id);

        let activations_restantes = '';
       
        if(activation_total == '1') {
         activations_restantes = '1'; 
        } else if(activation_total == '3') {
         activations_restantes = '3'; 
        } else if(activation_total == '5') {
         activations_restantes = '5'; 
        } else if(activation_total == '10') {
         activations_restantes = '10';
        }

        // var userInfo = {
        //     'buyer_id': buyer_id,
        //     'order_id': order_id,
        //     'variation_id': activation_total,
        //     'activation_restantes': activations_restantes,
        //     'licence_key': token,
        //     'status': 'publish'
        // }
        // console.log(userInfo);
        
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', siteData.nonce);
            },
            url: siteData.root_url + '/wp-json/site/v1/manageLicence',
            type: 'POST',
            data: {
                'buyer_id': buyer_id,
                'order_id': order_id,
                'variation_id': activation_total,
                'activation_restantes': activations_restantes,
                'licence_key': token,
                'status': 'publish'
            }, 
            success: (response) => {
                console.log('reponse',response);

                this.reloadPage();
            },
            error: (error) => {
                console.log('dommage');
                console.log('erreur', error);
            }

        });
    }

    reloadPage() {
        window.location.reload();
    }

    copyToClipBoard(e) {
        var currentKeyLicenceButton = $(e.target).closest('.copy_to_clipboard');
        console.log(currentKeyLicenceButton.attr('data-key'));
        console.time('time1');
        var temp = $("<input>");
        $("body").append(temp);
        temp.val(currentKeyLicenceButton.attr('data-key')).select();
        document.execCommand("copy");
        temp.remove();
        console.timeEnd('time1');
    }
}


export default MyLicenceKey;