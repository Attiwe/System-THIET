<script>
  $(document).ready(function() {
    $('.delete_confirm').on('click', function(e) {
      e.preventDefault();
      
      const form = $(this).closest('form');
      const labName = $(this).closest('tr').find('td:nth-child(3)').text(); // اسم المختبر
      
      Swal.fire({
        title: 'هل أنت متأكد من الحذف؟',
        text: `سيتم حذف المختبر: ${labName}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'نعم، احذف!',
        cancelButtonText: 'إلغاء',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
</script>
