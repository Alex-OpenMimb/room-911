const deleteUser = (id, action) => {

    Swal.fire({
        title: '¿Delete user?',
        text: "¡you can't change this action!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete'
        }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('deleteUser', id, action)
            Swal.fire(
            'Delete!',
            'been successfully delete',
            'success'
            )
        }
    })
}
