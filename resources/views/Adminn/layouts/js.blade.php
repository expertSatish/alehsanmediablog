   <!-- JAVASCRIPT -->
     <script src="{{asset('admin_assets/libs/jquery/jquery.min.js')}}"></script>
     <script src="{{asset('admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('admin_assets/libs/metismenu/metisMenu.min.js')}}"></script>
     <script src="{{asset('admin_assets/libs/simplebar/simplebar.min.js')}}"></script>
     <script src="{{asset('admin_assets/libs/node-waves/waves.min.js')}}"></script>

     <!-- apexcharts -->
     <script src="{{asset('admin_assets/libs/apexcharts/apexcharts.min.js')}}"></script>

     <!-- dashboard init -->
     <script src="{{asset('admin_assets/js/pages/dashboard.init.js')}}"></script>

     <!-- App js -->
     <script src="{{asset('admin_assets/js/app.js')}}"></script>
    </body>
    </html>
 <script type="text/javascript">



    
   


    // banner start....
     $(document).ready(function () {
        $(document).on('click','.Deletebtn',function(){
            var bann_id = $(this).val();
            //alert(bann_id);
            $('#Deletebanner').modal('show');
            $('#deletin_bann').val(bann_id);



    });


        $(document).on('click', '.Editbtn',function () {
            var bann_id = $(this).val();
            //alert(ban_id);
            $('#editbanner').modal('show'); 

              $.ajax({
                    type: "GET",
                    url: "/admin/edit-banner/"+bann_id,
                    success:function(response){
                         // console.log(response);
                         $('#edit_titleenglish').val(response.banner.titleEnglish);
                         $('#edit_titleurdu').val(response.banner.titleUrdu);
                         $('#edit_titlehindi').val(response.banner.titleHindi);
                         $('#edit_titlearbic').val(response.banner.titleArbic);
                         $('#edit_descriptionenglish').val(response.banner.descriptionEnglish);
                         $('#edit_descriptionurdu').val(response.banner.descriptionUrdu);
                         $('#edit_descriptionahindi').val(response.banner.descriptionHindi);
                         $('#edit_descriptionarbic').val(response.banner.descriptionArbic);
                         $('#bann_id').val(bann_id);
                        
                    }

                 });
            });
        });



// category start........
         $(document).ready(function () {

          $(document).on('click','.deletebtn',function(){
               var cate_id = $(this).val();
               //alert(cate_id);
               $('#DeleteModal').modal('show');
               $('#deleting_id').val(cate_id);

          });


               $(document).on('click', '.editbtn',function () {
                 var cate_id = $(this).val();
                 $('#editModal').modal('show');

                 $.ajax({
                    type: "GET",
                    url: "/admin/edit-category/"+cate_id,
                    success:function(response){
                         // console.log(response.category['name']);
                         $('#category_name').val(response.category.name);
                         $('#edit_english').val(response.category.english);
                         $('#edit_hindi').val(response.category.hindi);
                         $('#edit_urdu').val(response.category.urdu);
                         $('#edit_arbic').val(response.category.arbic);
                         $('#category_id').val(cate_id);

                    }

                 });

             });
          });

    
    </script>

   