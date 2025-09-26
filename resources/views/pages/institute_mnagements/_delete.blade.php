 <script>
  $(document).on('click', '.delete_confirm', function (e) {
    e.preventDefault();
    let form = $(this).closest('form');
    
    Swal.fire({
      title: "هل أنت متأكد؟",
      text: "لن تتمكن من التراجع عن هذا الإجراء!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "نعم، احذفها!",
      cancelButtonText: "إلغاء"
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });

  });
</script>
