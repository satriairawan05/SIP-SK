<script src="{{ asset('ruang-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('ruang-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('ruang-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('ruang-admin/js/ruang-admin.min.js') }}"></script>
<!-- Page level plugins -->
<script src="{{ asset('ruang-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('ruang-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>

</body>

</html>
