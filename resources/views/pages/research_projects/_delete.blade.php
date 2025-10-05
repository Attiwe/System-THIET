<script>
  $(document).ready(function() {
    $('.delete_confirm').on('click', function(e) {
      e.preventDefault();
      
      const form = $(this).closest('form');
      const projectName = $(this).closest('tr').find('td:nth-child(4)').text(); // اسم البحث
      
      Swal.fire({
        title: 'هل أنت متأكد من الحذف؟',
        text: `سيتم حذف مشروع البحث: ${projectName}`,
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
