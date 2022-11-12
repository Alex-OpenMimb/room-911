
const deleteEmployee = (id, action) => {

    Swal.fire({
        title: '¿Delete employee?',
        text: "¡you can't change this action!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete'
        }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('deleteEmployee', id, action)
            Swal.fire(
            'Delete!',
            'been successfully delete',
            'success'
            )
        }
    })
}
