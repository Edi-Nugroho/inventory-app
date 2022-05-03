</div>

    <script type="text/javascript">
    $( '#single-select-field' ).select2( {
      theme: "bootstrap-5",
      width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
      placeholder: $( this ).data( 'placeholder' ),
    });

    $( '#single-select-field-1' ).select2( {
      theme: "bootstrap-5",
      width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
      placeholder: $( this ).data( 'placeholder' ),
    });

    $( '#single-select-field-2' ).select2( {
      theme: "bootstrap-5",
      width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
      placeholder: $( this ).data( 'placeholder' ),
    });

    $( '#single-select-field option, #single-select-field-1 option' ).addClass("select2-font");
    </script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="<?= base_url('assets/sidebar-assets/')?>jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="<?= base_url('assets/sidebar-assets/')?>popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/sidebar-assets/')?>bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="<?= base_url('assets/sidebar-assets/')?>jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal-dark"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script src="<?= base_url('assets/datepicker/'); ?>bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
      $(function(){
        $('#datepicker').datepicker({
          format: 'dd-mm-yyyy',
          
        });

        $('#datepicker1').datepicker({
          format: 'dd-mm-yyyy',
          
        }); 
      })
    </script>

    <script src="<?= base_url('assets/datatable/'); ?>jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/datatable/'); ?>dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                pageLength : 5,
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 30]],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_data",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Tampilkan _PAGE_ sampai _PAGES_",
                    "infoEmpty": "Data tidak ada",
                    "infoFiltered": "(memfilter dari _MAX_ data)",
                    "search": "Cari"
                }
            });
        } );
    </script>

</body>

</html>