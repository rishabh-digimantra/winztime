<script>
    /**
     * Reedeem Z point function
     */
    function payWLpoitns_new(points) {
        // console.log(points)
        if (document.getElementById("lpoints-pay").checked == true) {
            jQuery('#lpointChecker').val('added');
            if (points < 100) {
                alert("You need minimum 100 Zpoints!");
                $("#lpoints-pay").removeAttr('checked');
                return "";
            }
            redeem_point = $('#redeem_point').text();
            total_price = $('.totalPrice').text();
            paymemnt_to_be_done = 0;
            left_point = 0;
            left_value = 0;
            if (redeem_point % 10 == 0) {
                console.log('if')
                redeem_divide = redeem_point / 10;
                console.log(total_price, redeem_divide)

                if (total_price >= redeem_divide) {
                    quotient = Math.floor(total_price / 10) * 10;
                    console.log(quotient, total_price, redeem_divide)
                    if (redeem_divide % 10 == 0) {
                        if (quotient >= redeem_divide) { // 40 > 30
                            paymemnt_to_be_done = total_price % 10; // 5
                            paymemnt_to_be_done = (quotient - redeem_divide) + paymemnt_to_be_done;
                            console.log(paymemnt_to_be_done)
                        }
                    } else {
                        redeem_divide = (Math.floor(redeem_point / 100)) * 100;
                        left_point = redeem_point - redeem_divide;
                        paymemnt_to_be_done = total_price - (redeem_divide / 10)
                    }

                } else if (total_price < redeem_divide) { // 15 < 30
                    console.log(total_price, redeem_divide, 'elseeeeeee if') // 30 < 55 

                    if (redeem_divide % 10 == 0) {
                        console.log('sss1')
                        quotient = Math.floor(total_price / 10) * 10;
                        if (quotient > redeem_divide) { // 40 > 30
                            paymemnt_to_be_done = total_price % 10; // 5
                            left_point = (redeem_divide - quotient) * 10;

                        } else {
                            paymemnt_to_be_done = total_price % 10;
                            left_point = (redeem_divide - quotient) * 10;
                        }
                    } else {
                        console.log('if else ')
                        quotient = Math.floor(total_price / 10) * 10;
                        if (quotient > redeem_divide) { // 40 > 30
                            paymemnt_to_be_done = total_price % 10; // 5
                            left_point = (redeem_divide - quotient) * 10;

                        } else {
                            paymemnt_to_be_done = total_price % 10;
                            left_point = (redeem_divide - quotient) * 10;
                        }
                    }

                }
            } else {
                console.log('else')

                redeem_point = parseFloat(redeem_point);
                quotient = Math.floor(redeem_point / 100) * 100;
                left_value = redeem_point - quotient;
                redeem_divide = (redeem_point - left_value) / 10;

                if (total_price > redeem_divide) {
                    quotient = Math.floor(total_price / 10) * 10;
                    if (quotient >= redeem_divide) { // 40 > 30
                        paymemnt_to_be_done = total_price % 10; // 5
                        paymemnt_to_be_done = (quotient - redeem_divide) + paymemnt_to_be_done;

                    }
                } else if (total_price < redeem_divide) { // 15 < 30

                    quotient = Math.floor(total_price / 10) * 10;
                    if (quotient > redeem_divide) { // 40 > 30
                        paymemnt_to_be_done = total_price % 10; // 5
                        left_point = (redeem_divide - quotient) * 10;

                    } else {
                        paymemnt_to_be_done = total_price % 10;
                        left_point = (redeem_divide - quotient) * 10;
                    }
                }

            }
            left_point = left_point + left_value;
            // redeem_point = $('#redeem_point').text(left_point);
            $('#remaning_text').text("The remaining Balance of your Z-Points will be " + left_point);
            total_price = $('.totalPrice').text(paymemnt_to_be_done);

            $('#remaining_point').val(left_point);
            $('#product_price').val(paymemnt_to_be_done);
            // console.log(left_point, paymemnt_to_be_done)

        } else {
            location.reload();
            return false;
        }
    }

    jQuery(document).on('click', '#card_label', function(e) {
        total_price = parseFloat($('.totalPrice').text());
        if (total_price == 0) {
            $('.myLoader').show();
            $('#update_cart_form').submit();
        } else {
            $('.myLoader').show();
            localStorage.setItem('lpointChecker', $('#lpointChecker').val());
            localStorage.setItem('remaining_point', $('#remaining_point').val());
            localStorage.setItem('product_price', $('#product_price').val());
            jQuery.ajax({
                url: '{{ URL::to("/addToNetwork")}}',
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: {
                    "value": jQuery(".totalPrice").text(),
                    "address": jQuery(".address").text(),
                    city: jQuery(".city").text()
                },
                success: function(res) {
                    console.log(res);
                    window.location = res;
                },
            });
        }

    });

    jQuery(document).ready(function(e) {
        if (window.location.search.length == 0) { // if no ref id then remove localstorage variable
            localStorage.removeItem('remaining_point');
            localStorage.removeItem('product_price');
            localStorage.removeItem('lpointChecker');
        } else { // save checkbox value to localstorage
            remaining_point = localStorage.getItem('remaining_point');
            product_price = localStorage.getItem('product_price');
            checkbox_value = localStorage.getItem('lpointChecker');
            // console.log(remaining_point, '======', product_price, '-==-=-=', checkbox_value)
            $('#remaining_point').val(remaining_point);
            $('#product_price').val(product_price);
            if (checkbox_value == 'added') {
                $('#lpointChecker').val('added')
                $("#lpoints-pay").prop("checked", true);
            }
        }

    });

    // $('#reg-form').validate();   

    $('#register-btn').click(function(e) {
        console.log($("#reg-form").valid())
        if ($("#reg-form").valid() == true) {
            $('#loader').show();
        }
    });

    $('#order_lpoints').val($('.js-earned-points').text());
</script>

