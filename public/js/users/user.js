
const handleState = (id, status, action) => {
    if (status == 'Active') {
        status = 'Inactive'
    }else{
        status = 'Active'
    }

    Swal.fire({
        title: '¿Change Status?',
        text: "¡I can change it every time!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, ¿'+`${status}`+'?'
        }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('handleState', id, status, action)
            Swal.fire(
            'Updated!',
            'been successfully updated',
            'success'
            )
        }
    })
}

const deleteEmployee = (id, action) => {

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
