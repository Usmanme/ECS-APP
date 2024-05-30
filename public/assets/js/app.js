$(document).ready(function () {
    // Table

   $('#bookingtable').dataTable({
        "lengthMenu": [ [25, 50, 100], [25, 50, 100] ], // Set the options for pagination
        "pageLength": 25 // Set the default page length
        
    });

    $('#bookingtable_in_booking').dataTable({
        "lengthMenu": [ [25, 50, 100], [25, 50, 100] ],
        "pageLength": 25,
        "order": [[0, "desc"]]
    });

    $('#booking').dataTable({
        "lengthMenu": [ [25, 50, 100], [25, 50, 100] ],
        "pageLength": 25
    });

    // Remove Search text
    $('div#bookingtable_in_booking_filter input[type="search"]').attr('placeholder', 'Search here..');
    $('<img src="./assets/images/search_icon.png" alt="Search" />').insertBefore($('div#bookingtable_in_booking_filter input[type="search"]'));
    $('div#bookingtable_in_booking_filter>label')[0].childNodes[0].textContent = '';

    let btn_name = $('.booking_header_title > h2').text();
    let modal_id = $('.modal_form').attr('id');
    $('div#bookingtable_in_booking_filter').append(`<button type="button" class="btn add_btn btn-red" data-toggle="modal" data-target="#${modal_id}">Add ${btn_name}</button>`);

    // Remove alert msg
    setTimeout(() => {
        $('.ecs_alert').remove();
    }, 5000);

    // Edit Driver
    $('.edit_driver_btn').on('click', function () {
        let _this = $(this);
        let inputHidden = _this.parent().parent().find('input[type="hidden"]');

        $('#editDriverModal form').attr('action', _this.data('edit_action'));
        $('#editDriverModal #firstname').val(inputHidden.data('firstname'));
        $('#editDriverModal #lastname').val(inputHidden.data('lastname'));
        $('#editDriverModal #phone_number').val(inputHidden.data('phone_number'));
        $('#editDriverModal #iqama_number').val(inputHidden.data('iqama_number'));
        $('#editDriverModal #email_addr').val(inputHidden.data('email_addr'));
        $('#editDriverModal .edit_modal_img').attr('src', inputHidden.data('img'));
    });

    // Edit Vechicle
    $('.edit_vehicle_btn').on('click', function () {
        let _this = $(this);
        let inputHidden = _this.parent().parent().find('input[type="hidden"]');

        $('#editVehicleModal form').attr('action', _this.data('edit_action'));
        $('#editVehicleModal #vehicle_brand').val(inputHidden.data('brand'));
        $('#editVehicleModal #vehicle_model').val(inputHidden.data('model'));
        $('#editVehicleModal #vehicle_year').val(inputHidden.data('year'));
        $('#editVehicleModal #vehicle_type').val(inputHidden.data('type'));
        $('#editVehicleModal #vehicle_code').val(inputHidden.data('code'));
        $('#editVehicleModal #registration_no').val(inputHidden.data('reg_no'));
        $('#editVehicleModal #vehicle_pass_cap').val(inputHidden.data('pass_cap'));
        $('#editVehicleModal #vehicle_category').val(inputHidden.data('category'));
        $('#editVehicleModal #vehicle_insurance').val(inputHidden.data('insurance'));
        $('#editVehicleModal #vehicle_color').val(inputHidden.data('color'));
        $('#editVehicleModal #vehicle_fare').val(inputHidden.data('fare'));
        $('#editVehicleModal #vehicle_destination_type').each(function (i, v) {
            if ($(v).val() == inputHidden.data('destination-type')) {
                $(v).attr('selected', 'selected');
            }
        })
        $('#editVehicleModal .edit_modal_img').attr('src', inputHidden.data('img'));
        $('#editVehicleModal .edit_modal_attachment').attr('href', inputHidden.data('attachment'));
    });

    // Edit Customer
    $('.edit_customer_btn').on('click', function () {
        let _this = $(this);
        let inputHidden = _this.parent().parent().find('input[type="hidden"]');

        $('#editCustomerModal form').attr('action', _this.data('edit_action'));
        $('#editCustomerModal #name').val(inputHidden.data('name'));
        $('#editCustomerModal #mobile_number').val(inputHidden.data('mobile_number'));
        $('#editCustomerModal #email').val(inputHidden.data('email'));
        $('#editCustomerModal #nationality').val(inputHidden.data('nationality'));
        $('#editCustomerModal #company').val(inputHidden.data('company'));
        $('#editCustomerModal #department').val(inputHidden.data('department'));
        $('#editCustomerModal #designation').val(inputHidden.data('designation'));
        $('#editCustomerModal .edit_modal_img').attr('src', inputHidden.data('img'));
    });
    

});

