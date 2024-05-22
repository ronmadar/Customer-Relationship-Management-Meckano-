$(document).ready(function () {
    $(document).on('click','.delete_customer_btn', function (e) {
        e.preventDefault();
        $id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'customer_id': $id,
                        'delete_customer_btn': true
                    },
                    success: function (response) {
                        if(response == 200){
                            // title , message , icon
                            swal("Success!", "Customer Deleted Successfully!", "success");
                            // Reload the customer_table content. selector id=customer_table, 
                            $("#customer_table").load(location.href + " #customer_table");
                        }else if(response == 500){
                            swal("Error!", "Something Went Wrong!", "error");
                        }
                    }
                });
             
            }
          });

    });

});