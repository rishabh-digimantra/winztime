<script type="text/javascript">
    jQuery(document).on('click', '.modal_show_products', function(e) {
        jQuery("#products-detail").html("");
        var parent = jQuery(this);

        var products_id = jQuery(this).attr('products_id');
        var message;
        jQuery(function($) {
            jQuery.ajax({
                url: '{{ URL::to("/modal_show_products")}}',
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: '&products_id=' + products_id,
                success: function(res) {
                    console.log(res)
                    $("#products-detail").html(res);
                    jQuery('#myModal').modal('show');

                },
            });
        });
    });
</script>

<style>
    a.nav-link.active::after {
        background: #ff0 !important;
    }

    a.nav-link.active {
        color: #ff0 !important;
    }

    .thumbnail-banner {
        position: absolute;
        bottom: 17px;
        width: 100%;
        height: 63px;
        left: 0;
    }

    .reward_title {
        white-space: initial;
    }

    .sold_campaigns_title {
        white-space: initial;
    }


    .sec3Wrp small {
        white-space: break-spaces;
    }

    .customhhieght {
        height: 500px;
    }

    .sec6Wrp {
        height: 321px;
    }

    p.mobilewinztext {
        font-size: 15px;
        line-height: 21px;
        padding: 0 40px;
        text-align: center;
        margin-top: 0px;
        padding: 0px 102px;
    }

    .mobilewinztimeview {
        margin: 0 auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        max-width: 1000px;
    }

    .container.postionSet {
        position: relative;
        text-align: center;
    }

    img.imgsetraffletwo {
        display: none;
    }

    @media screen and (min-device-width: 601px) and (max-device-width: 767px) {

        p.mobilewinztext {
            font-size: 10px;
            line-height: 15px;
            padding: 0 40px;
            text-align: center;
            margin-top: -12px;
            padding: 0px 102px;
        }
    }

    @media screen and (min-device-width: 320px) and (max-device-width: 600px) {
        p.mobilewinztext {
            font-size: 13px;
            padding: 0 40px;
            text-align: center;
        }

        .mobilewinztime h2 {
            font-size: 14px;
            height: 50px;
        }

        img.imgsetraffleone {
            display: none;
        }

        img.imgsetraffletwo {
            display: block;
        }



    }

    @media screen and (min-device-width: 320px) and (max-device-width: 360px) {
        p.mobilewinztext {
            font-size: 10px;
            line-height: 16px;
        }

        .home-section-six .sec6Wrp {
            width: 256px;
            font-size: 8px;
        }

        .home-section-six .sec6MainWrap {
            padding: 10px 0px 15px 7px;
        }

        .home-section-six .sec6Wrp h4,
        .home-section-six .sec6Wrp p {
            font-size: 10px;
        }

        .mobilewinztime h2 {
            font-size: 13px;

        }
    }
</style>