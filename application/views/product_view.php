<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cayanan POS</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    </head> 
<body>

    <div class="container">
    <div style='margin-top: 15px !important;' class="form">

    <div>
    <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/><!-- ID Checker --> 
                    
                    <div class='row' style='margin-top: 0px !important;'>
                                <div style='margin-top: -15px !important;' class='col-md-2' >
                                    <h3>Product Name</h3>
                                </div>

                                 <div class='col-md-4'>
                                    <input type='text' class='form-control mt ' name='prodName' placeholder='Product Name'>
                                    <span class="help-block"></span>            
                                </div>

                                <div style='margin-top: -15px !important;' class='col-md-2' >
                                    <h3>Product Code</h3>
                                </div>

                                <div class='col-md-4'>
                                    <input type='text' class='form-control mt ' name='prodCode' placeholder='Product Code'>
                                    <span class="help-block"></span>
                                </div>
                          </div>
                    </div>
                   
                    <div class='row' style='margin-top: 0px !important;'>
                                <div style='margin-top: -15px !important;' class='col-md-2'>
                                    <h3>Product Price</h3>
                                </div>

                                 <div class='col-md-4'>
                                     <input type='text' placeholder="Product Price" class="form-control " name='prodPrice'  onkeyup="javascript:this.value=this.value.replace(/[^0-9-]/g, '');">
                                     <span class="help-block"></span>
                                </div>

                                <div style='margin-top: -15px !important;' class='col-md-2'>
                                    <h3>Product Qty</h3>
                                </div>

                                <div class='col-md-4'>
                                    <input type='text' placeholder="Product Quantity" class="form-control " name='prodQuan' onkeyup="javascript:this.value=this.value.replace(/[^0-9-]/g, '');" >
                                     <span class="help-block"></span>
                                </div>
                          </div>
                    </div>

                   

            <div class="alert alert-success" style="display: none;">
            </div>
            <div class="alert alert-danger" style="display: none;">
            </div>
            <div class="alert alert-info" style="display: none;">
            </div>

            <button id="btnAdd" class="btn btn-success">View Cart</button>

          <div class='row pull-right'>
                                <div class="col-md-12 ">
                                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                                <button type="button" onclick="reload_table()" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-erase"></i> Cancel/Clear</button>
                                </div>
                            </div>
        </form>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="info">
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Price</th>
                    <th>Product Qty</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </form>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var table;

    $(document).ready(function() {
    $checkadd="";
    //datatables
    table = $('#table').DataTable({ 
    
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('product/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });


    //datepicker
   

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});

   /* $(document).ready(function() {
  
    //datatables
    table = $('#table1').DataTable({ 
    
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('product/cart_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });


    //datepicker
   

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});
*/
$('#btnAdd').click(function(){
            
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Cart');
            /*$('#myForm').attr('action', '<?php echo base_url() ?>employee/addEmployee');*/
        });





function edit_product(id)
{
    $checkadd='edit';
    $('#form')[0].reset(); // reset form 
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('product/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $checkadd=$('[name="id"]').val(data.id);
            $('[name="prodName"]').val(data.prodName);
            $('[name="prodCode"]').val(data.prodCode);
            $('[name="prodPrice"]').val(data.prodPrice);
            $('[name="prodQuan"]').val(data.prodQuan);
            
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


function add_to_cart(id)
{
            $('#modalQty').modal('show');
            $('#modalQty').find('.modal-title').text('Add Quantity');
            
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('product/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            
            $('[name="prodNamemod"]').val(data.prodName);
            $('[name="prodCodemod"]').val(data.prodCode);
            $('[name="prodPricemod"]').val(data.prodPrice);
            $('[name="prodQuanmod"]').val(data.prodQuan);
            
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    $('#form')[0].reset(); // reset form on modals
    table.ajax.reload(null,false); //reload datatable ajax 
    $checkadd='';
}

function save()
{
    
    var url;

    if($checkadd == '') {   
        url = "<?php echo site_url('product/ajax_add')?>";
    } else {
        
        url = "<?php echo site_url('product/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) 
            {
                 if($checkadd == ''){
                    
                $('.alert-success').html('<center>Added Successfully</center>').fadeIn().delay(2000).fadeOut('fast');
                }   else{
                    
                $('.alert-info').html('<center>Updated Successfully</center>').fadeIn().delay(2000).fadeOut('fast');
                }
                $('#form')[0].reset(); // reset form
                reload_table();

               
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $checkadd='';
           

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
           

        }
    });
}

function delete_product(id)
{
    if(confirm('Are you sure you want to delete this?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('product/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                reload_table();
                $('.alert-danger').html('<center>Deleted Successfully</center>').fadeIn().delay(2000).fadeOut('fast');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

  $(function() {
      $("#prodPrice, #modQuan").on("keydown keyup", compAmount);
      function compAmount() {
      $("#prodAmount").val(Number($("#prodPrice").val()) * Number($("#modQuan").val()));

      }
      });



$(document).on('click','#qtySave',function(){
    
            var url = $('#qtyForm').attr('action');
            var data = $('#qtyForm').serialize();
            //validate form
            var prodName = $('input[name=prodNamemod]');
            var prodPrice = $('input[name=prodPricemod]');
            var remQuan  = $('input[name=prodQuanmod]');
            var modQuan=  $('input[name=modQuanmod]');
            var prodAmount = $('input[name=prodAmountmod]');
            if(parseInt(modQuan.val()) > parseInt(remQuan.val())){
               alert('Quantity cannot be greater than Remaining Quantity');
            }else{
                $('#modalQty').modal('hide');
             
                 $.ajax({

        url : "<?php echo site_url('product/add_cart')?>",
        type: "POST",
        data: $('#qtyForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) 
            {
                 
                    $('.alert-success').html('<center>Added to cart successfully</center>').fadeIn().delay(4000).fadeOut('slow');
               
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
        
           

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
           

        }
    });
            }
});

  

</script>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr class="info">
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Qty</th>
                    <th>Product Amount</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modalQty" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
       <div class="modal-body">
            <form id="qtyForm" action="" method="post" class="form-horizontal">
                <input type="hidden" name="txtId" value="0">
                <div class="form-group">
                    <label for="name" class="label-control col-md-4">Product Name</label>
                    <div class="col-md-8">
                        <input type="text" name="prodNamemod" class="form-control" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="label-control col-md-4">Price</label>
                    <div class="col-md-8">
                        <input class="form-control" id="prodPrice" name="prodPricemod" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="label-control col-md-4">Remaining Quantity</label>
                    <div class="col-md-8">
                        <input class="form-control" name="prodQuanmod" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="label-control col-md-4">Quantity</label>
                    <div class="col-md-8">
                        <input class="form-control" id="modQuan" name="modQuanmod" placeholder="Input Quantity" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="label-control col-md-4">Amount</label>
                    <div class="col-md-8">
                        <input class="form-control" id="prodAmount" name="prodAmountmod" readonly />
                    </div>
                </div>

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="qtySave" class="btn btn-primary">Add to Cart</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>